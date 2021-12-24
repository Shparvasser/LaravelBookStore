<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'comments' => 'required|min:20|max:500',
            // 'author_id' => 'unique_with:ratings,book_id',
            'rating' => 'required',
            // 'author_id' =>  Rule::unique('ratings')->where(function ($query) {
            //     return $query->where('author_id', $this->request->get('author_id'));
            // })
            // 'book_id' => Rule::unique('ratings', 'book_id')->where(function ($query) {
            //     return $query->where('author_id', $this->request->get('author_id'));
            // })
            'book_id' => 'unique_with:ratings,author_id',
            'author_id' => 'required'
        ];
    }
}
