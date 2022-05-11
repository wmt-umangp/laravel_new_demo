<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserAccountFormRequest extends FormRequest
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
            'name'=>'required|max:120|regex:/^[\pL\s\-]+$/u',
            'email'=>'required|email|unique:users,email',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:3000',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Please Enter First Name',
            'name.max'=>'Maximum 120 characters allowed!!',
            'name.regex'=>'First Name Must be in letters only',
            'email.required'=>'Please Enter Email',
            'email.email'=>'Please Enter Valid Email',
            'email.unique'=>'Email already Exists',
            'image.required'=>'Please Upload Image',
            'image.image'=>'File Must be image',
            'image.mimes'=>'Supported Image formats are jpg, png, jpeg, gif, svg',
            'image.max'=>'Image Size Must Be Less Than 3MB'
        ];
    }
}
