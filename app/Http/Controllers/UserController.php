<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\DumpHandler;

class UserController extends Controller
{
    //Show Register/Create Form
    public function create(){
        return view('users.register');
    }
    //Create New User and Store
    public function store(Request $request){
        $formsFields=$request->validate([
            'name'=>['required','min:3'],
            'email'=>['required','email', RULE::unique('users','email')],
            'password'=>'required|confirmed|min:6'
        ]);
        //Hash Passwords
        $formsFields['password'] = bcrypt($formsFields['password']);

        //Create User
        $user = User::create($formsFields);

        //login
        auth()->login($user);

        return redirect('/')->with('message', 'Account Successfully Created You Logged In');
    }
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message','Successfully Loggedout!');
    }
    //Show Login Form
    public function login()
    {
        return view('users.login');
    }
    //Authenticate User
    public function authenticate(Request $request)
    {
        $formFields=$request->validate([
            'email'=>['required','email'],
            'password'=>'required'
        ]);
        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You have successfully Logged in');
        }
        return back()->withErrors(['email'=>'Invalid User email or Password'])->onlyInput('email');
    }
}
