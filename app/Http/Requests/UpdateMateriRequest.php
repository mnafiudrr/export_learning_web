<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMateriRequest extends FormRequest
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
            'materi_id'                 => 'required|integer',
            'logo'                      => 'required|string_or_file',
            'header'                    => 'required|string_or_file',
            'title'                     => 'required|string',
            'contents'                  => 'array',
            'contents.*.content_type'     => 'required|in:link,image,text',
            'contents.*.value'            => 'required|string_or_file'
        ];
    }
}
