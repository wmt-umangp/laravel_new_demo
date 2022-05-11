<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;

// for registration
Route::get('/register/admin',[UserController::class,'showadminregister'])->name('showadminregister');
Route::get('/register/student',[UserController::class,'showstudentregister'])->name('showstudentregister');
Route::post('/register/admin',[UserController::class,'store'])->name('adminsignup');
Route::post('/register/student',[UserController::class,'studentstore'])->name('studentsignup');

// for Login
Route::get('/login/admin',[UserController::class,'showadminlogin'])->name('showadminlogin');
Route::get('/login/student',[UserController::class,'showstudentlogin'])->name('showstudentlogin');
Route::post('/login/admin', [UserController::class,'adminLogin'])->name('adminsignin');
Route::post('/login/student', [UserController::class,'studentLogin'])->name('studentsignin');

Route::middleware(['auth:admin'])->group(function () {
    // for Dashboard
    Route::get('/admin/dashboard',[UserController::class,'index'])->name('admindashboard');

    //add student
    Route::get('/admin/addstudent',[StudentController::class,'addStudents'])->name('addstudents');

    //for saving students
    Route::post('/admin/postaddstudent',[StudentController::class,'postSaveStudent'])->name('postaddstudent');

    //for showing all students list
    Route::get('/admin/showallstudents',[StudentController::class,'allStudents'])->name('allstudentslist');

    Route::get('/admin/deletestudent/{did}',[StudentController::class,'deleteStudent'])->name('deletestudent');

    Route::get('/admin/account',[UserController::class,'getAccount'])->name('adminaccount');

    Route::get('/admin/editaccount',[UserController::class,'editAccountDisplay'])->name('admineditaccount');

    Route::post('/admin/updateaccount',[UserController::class,'postSaveAccount'])->name('adminupdateaccount');
});

Route::middleware(['auth:student'])->group(function (){
    Route::get('/student/dashboard',function (){
        return view('studentdashboard');
    })->name('studentdashboard');
});

//for logout
Route::get('alogout',[UserController::class,'alogout'])->name('alogout');
Route::get('slogout',[UserController::class,'slogout'])->name('slogout');
