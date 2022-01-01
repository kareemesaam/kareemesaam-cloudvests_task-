<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FileRequest;
use App\Http\Resources\FileResource;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(FileRequest $request)
    {
        $attributes = array_merge($request->validated(),[
            'size'=>$request->file('file'),
            'path' => $request->file('file'),
            'content'=> sha1_file($request->file('file'))
        ]);
        $file = File::create($attributes);
        return response()->json('File '.$file->name.' Uploaded Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return FileResource
     */
    public function show(File $file)
    {
        return new FileResource($file);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(File $file)
    {
        if(File::Similar($file->size,$file->content)->firstWhere('id','!=',$file->id) == null){
            unlink(public_path('files/'.$file->path));
        }
        $file->delete();
        return response()->json('File '.$file->name.' Deleted Successfully');

    }
}
