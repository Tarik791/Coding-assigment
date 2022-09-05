<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TestFormRequest extends FormRequest
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
            'courses_id' => [

                'required',
                'integer'
            ],

            'title' => [

                'required',
                'string'
            ],


            'description' => [

                'required',
                
            ],


            'image' => [

                'nullable',
                'image'
            ]

        ];

        return $rules;
    }
}
