<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Todo;

class TodoCreateRequest extends FormRequest
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
            // Title Rule
            'title' => 'required|min:3|max:255|unique:todos,title',
            'description' => 'required|min:3|max:255'
        ];
    }

    public function messages()
    {
        return [
            'title.min' => 'Todo title is minimum 3 characters',
            'title.max' => 'Todo title is maximum 255 characters',
        ];
    }
}
