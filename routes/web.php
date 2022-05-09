<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;

// for registration
Route::get('register',[UserController::class,'register'])->name('register');
Route::post('signup',[UserController::class,'store'])->name('signup');

// for Login
Route::get('login',[UserController::class,'login'])->name('login');
Route::post('signin', [UserController::class,'authenticate'])->name('signin');

Route::middleware(['auth'])->group(function () {
    // for Dashboard
    Route::get('dashboard',[UserController::class,'index'])->name('dashboard');

    //add student
    Route::get('addstudent',[StudentController::class,'addStudents'])->name('addstudents');

    //for saving students
    Route::post('postaddstudent',[StudentController::class,'postSaveStudent'])->name('postaddstudent');

    //for showing all students list
    Route::get('showallstudents',[StudentController::class,'allStudents'])->name('allstudentslist');
});

//for logout
Route::get('logout',[UserController::class,'logout'])->name('logout');
