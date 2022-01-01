<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public  function ScopeSimilar( $query ,$size,$content) {
         return $query->where('size',$size)->where('content',$content);
    }

    public function setSizeAttribute($value)
    {
        $this->attributes['size'] = $value->getSize();;
    }

    public function setPathAttribute($value)
    {
        $name = time().'.'.$value->getClientOriginalName();
        $destinationPath = public_path('files');
        $similar = self::Similar($value->getSize(),sha1_file($value))->first();
        if ( $similar!== null){
            $this->attributes['path'] = $similar->path;
        } else{
            $value->move($destinationPath, $name);
            $this->attributes['path'] = $name;
        }
    }

    public function getPathAttribute($value)
    {
         return asset('files/'.$value);
    }
}
