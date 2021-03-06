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
            'name'   => 'required|min:3',
            'rating' => 'required|integer',
            'description' => 'required|min:6'
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'name.min' => 'A name should be minimal 3 letter',
            'rating.required'  => 'Rating is required',
            'rating.integer'  => 'Rating is required',
            'description.required'  => 'A review is required'
        ];
    }
}
