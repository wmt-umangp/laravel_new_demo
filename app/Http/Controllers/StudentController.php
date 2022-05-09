<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddStudentFormRequest;
use App\Models\Student;
use Auth;
class StudentController extends Controller
{
   public function allStudents(){
       $student=Student::with('user')->latest()->paginate(5);
        return view('getallstudents',['student'=>$student]);
   }
   public function addStudents(){
        return view('addstudent');
   }
   public function postSaveStudent(AddStudentFormRequest $request){
        // echo "Hello";
        $student= Student::create(
            [
                'roll_no'=>$request->roll_no,
                'name'=>$request->name,
                'standard'=>$request->standard,
                'age'=>$request->age,
                'user_id'=>Auth::user()->id,
                'email'=>$request->email,
            ]
        );
        if($student){
            return redirect()->route('dashboard')->with('logined','Student added Successfully');
        }else{
            echo "Error While Adding Students";
        }
   }
}
