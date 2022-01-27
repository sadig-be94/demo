<?php

namespace Modules\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{

    public function rules()
    {
        return [
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:50000',
            'title'=>'required',
            'text'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'image.required'=>'Şəkil mütləqdir',
            'image.mimes'=>'Şəkil düzgün formada deyil',
            'image.max'=>'Şəkilin həcmi maxsimim 4mb ola bilər',
            'title.required'=>'Başlıq mütləqdir',
            'text.required'=>'Mövzu mütləqdir',
        ];
    }
    public function authorize()
    {
        return true;
    }
}
