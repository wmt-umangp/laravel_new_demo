<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddStudentFormRequest extends FormRequest
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
            'roll_no'=>'required|numeric|unique:students,roll_no',
            'name'=>'required|max:100|regex:/^[\pL\s\-]+$/u',
            'standard'=>'required|numeric',
            'age'=>'required|numeric',
            'email'=>'required|email|unique:students,email',
        ];
    }
    public function messages()
    {
        return [
            'roll_no.required'=>'Please Enter Roll No',
            'roll_no.number'=>'Only Numbers allowed',
            'roll_no.unique'=>'Student with this Roll No is already Registered',
            'name.required'=>'Please Enter Name',
            'name.regex'=>'Name Must be in numbers only',
            'standard.required'=>'Please Enter Standard',
            'standard.number'=>'Standard Must be in numbers only',
            'age.required'=>'Please Enter Age',
            'age.number'=>'Age Must be in Numbers only',
            'email.required'=>'Please Enter Email',
            'email.email'=>'Please Enter Valid Email',
        ];
    }

}
