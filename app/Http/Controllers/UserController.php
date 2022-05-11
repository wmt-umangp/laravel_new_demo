<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Http\Requests\EditUserAccountFormRequest;
use Auth, Session, Hash;
use App\Models\User;
use App\Models\Student;
use App\Events\studentMail;
use App\Jobs\studentMailJob;
use Illuminate\Contracts\Event\Dispatcher;
use Storage;
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
    public function showadminregister(){
        return view('registration',['url' => 'admin']);
    }
    public function showstudentregister(){
        return view('registration',['url' => 'student']);
    }
    public function showadminlogin(){
        return view('login',['url'=>'admin']);
    }
    public function adminLogin(LoginFormRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $remember_me = $request->has('remember') ? true : false;
        if (Auth::guard('admin')->attempt($credentials,$remember_me)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard')->with('logined','You have Successfully loggedin');
        }
        return redirect("/login/admin")->with('message','Opps! You have entered invalid credentials');
    }
    public function showstudentlogin(){
        return view('login',['url'=>'student']);
    }
    public function studentLogin(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        $credentials = $request->only('email', 'password');
        $remember_me = $request->has('remember') ? true : false;
        if(Auth::guard('student')->attempt($credentials,$remember_me)){
            $request->session()->regenerate();
            return redirect()->route('studentdashboard')->with('logined','You have Successfully loggedin');
            // echo "Hello";
        }
        return redirect("/login/student")->with('message','Opps! You have entered invalid credentials');
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
        return redirect()->route('admindashboard');
        // echo "Hello";
    }
    public function studentStore(Request $request)
    {
        $this->validate($request, [
            'roll_no'=>'required|numeric|unique:students,roll_no',
            'name'=>'required|max:100|regex:/^[\pL\s\-]+$/u',
            'standard'=>'required|numeric',
            'age'=>'required|numeric',
            'email'=>'required|email|unique:students,email',
            'password' => 'required|min:6',
            'cpassword' => 'required|same:password|min:6',
        ]);
        $student=Student::create([
            'roll_no'=>$request->roll_no,
            'name'=>$request->name,
            'standard'=>$request->standard,
            'age'=>$request->age,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        Auth::login($student);
        // event(new studentMail($request->email));
        dispatch(new studentMailJob($request->email));

        return redirect()->route('studentdashboard');
        // print_r($request->all());
    }
    public function getAccount(){
        return view('adminaccount',['user'=>Auth::user()]);
    }
    public function editAccountDisplay(){
        return view('admineditaccount',['user'=>Auth::user()]);
    }
    public function postSaveAccount(EditUserAccountFormRequest $request){
        $user=Auth::user();
        $files = $request->file('image');
        $folder='public/images/User-'.Auth::user()->id.'/';
        $filename=$files->getClientOriginalName();
        if (!Storage::exists($folder)) {
            Storage::makeDirectory($folder, 0775, true, true);
        }
        if (!empty($files)) {
            $files->storeAs($folder,$filename);
            $user->name=$request->input('name');
            $user->email=$request->input('email');
            $user->profile_img_path=$files->getClientOriginalName();
            $user->update();
        }
        return redirect()->route('adminaccount');
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
    public function alogout(){
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
            session::flush();
            return redirect('login/admin');
        }
    }
    public function slogout(){
        if(Auth::guard('student')->check()){
            Auth::guard('student')->logout();
            session::flush();
            return redirect('login/student');
        }
    }
}
