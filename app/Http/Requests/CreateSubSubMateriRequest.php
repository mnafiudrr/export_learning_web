<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSubSubMateriRequest extends FormRequest
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
            'sub_materi_id'               => 'required|integer',
            'title'                       => 'required|string',
            'logo'                        => 'required|image',
            'contents'                    => 'array',
            'contents.*.content_type'     => 'required|in:link,image,text',
            'contents.*.value'            => 'required'
        ];
    }
}
