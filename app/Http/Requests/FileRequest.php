<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
            'name' => 'unique:files',
        ];
    }
        protected function prepareForValidation()
    {
        $this->merge([
            'name' => $this->file('file')->getClientOriginalName(),
        ]);
    }

}
