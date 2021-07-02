<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMateriRequest extends FormRequest
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
            'logo'   => 'required|image',
            'header' => 'required|image',
            'title'  => 'required|string',
            'video_link' => 'string|url',
            'photo'     => 'required|image',
            'isi_paragraf' => 'array'
        ];
    }
}
