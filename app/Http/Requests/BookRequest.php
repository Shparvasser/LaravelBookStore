<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required|string|min:6|max:100',
            'photo' => 'required|image',
            'page' => 'required|integer|min:100|max:2500',
            'content' => 'required|string|min:100',
            'categories' => 'required'
        ];
    }
}
