<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CourseFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            //
           'title' => [
                'required',
                'string',
                'max:200'
           ],

           'description' => [
                'required',
                
                
           ],

           'image' => [
                'nullable',
                'image: jpeg, jpg, png',
                
           ],

           
        ];

        return $rules;
    }
}
