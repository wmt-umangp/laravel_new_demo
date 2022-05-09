<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use Auth, Session, Hash;
use App\Models\User;
use App\Models\Student;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student=Student::latest()->where('user_id',Auth::user()->id)->paginate(5);
        return view('dashboard',['student'=>$student]);
    }
    public function register(){
        return view('registration');
    }
    public function login(){
        return view('login');
    }
    public function authenticate(LoginFormRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $remember_me = $request->has('remember') ? true : false;
        if (Auth::attempt($credentials,$remember_me)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard')->with('logined','You have Successfully loggedin');
        }
        return redirect("login")->with('message','Opps! You have entered invalid credentials');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterFormRequest $request)
    {
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        Auth::login($user);
        return redirect()->route('dashboard');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('login');
    }
}
