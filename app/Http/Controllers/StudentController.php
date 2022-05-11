<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddStudentFormRequest;
use App\Models\Student;
use Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewStudentNotification;
class StudentController extends Controller
{
   public function allStudents(){
       $student=Student::latest()->paginate(5);
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
            // event(new Registered($student));
            Notification::send(Auth::user(), new NewStudentNotification($student));
            return redirect()->route('admindashboard')->with('logined','Student added Successfully');
        }else{
            echo "Error While Adding Students";
        }
   }
   public function deleteStudent($id){
        $student=Student::find($id);
        if(Auth::user() != $student->user){
            return redirect()->back();
        }
        $student->delete();
        return back()->with('logined','Student Deleted Successfully!!');
   }
}
