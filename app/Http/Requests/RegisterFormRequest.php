<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'name' => 'required',
            'username' =>'required|min:6|max:10|unique:users,username',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'cpassword' => 'required|same:password|min:6',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please Enter Name',
            'username.required'=>'Please Enter Username',
            'username.min'=>'Minimum 6 characters required',
            'username.max'=>'Maximum 10 characters allowed',
            'username.unique'=>'Username already exists',
            'email.required' => 'Please Enter Email',
            'email.email'=>'Please Enter Valid Email',
            'email.unique'=> 'Email Already Exists!!',
            'password.required' => 'Please Enter Password',
            'password.min'=>'Password must be 6 character long',
            'cpassword.required' => 'Please Enter Confirm Password',
            'cpassword.same'=>'Confirm Password must be same as Password',
            'cpassword.min'=>'Confirm Password must be 6 character long',
        ];
    }
}
