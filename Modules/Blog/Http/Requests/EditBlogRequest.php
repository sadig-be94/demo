<?php

namespace Modules\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditBlogRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title'=>'required',
            'text'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'Başlıq mütləqdir',
            'text.required'=>'Mövzu mütləqdir',
        ];
    }
    public function authorize()
    {
        return true;
    }
}
