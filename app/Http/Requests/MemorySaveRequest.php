<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemorySaveRequest extends FormRequest
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
          'date'=> 'required',
          'image'=> 'required|image|max:1999|mimes:jpg,jpeg,png'
        ];
    }

    public function messages()
    {
        return [
          'image.required' => 'Image is required!',
          'image.image' => 'File must be an image',
        ];
    }
}
