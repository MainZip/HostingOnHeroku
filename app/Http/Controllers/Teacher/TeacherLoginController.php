<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher;

class TeacherLoginController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'gender'=>'required',
            'email'=>'required|email|unique:teachers,email',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password'
        ]);
        $teachers = new Teacher();
        $teachers->firstname = $request->firstname;
        $teachers->lastname = $request->lastname;
        $teachers->gender = $request->gender;
        $teachers->email = $request->email;
        $teachers->password = \Hash::make($request->password);
        $save = $teachers->save();

        if( $save )
        {
            return redirect()->back()->with('success','You are now registered Successfully');
        }
        else
        {
            return redirect()->back()->with('fail','Something went wrong, Failed to register');
        }
    }
    public function check(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:teachers,email',
            'password'=>'required|min:5|max:30'
        ]);

        $creds = $request->only('email','password');
        if(Auth::guard('teacher')->attempt($creds)){
            return redirect()->route('teacher.dashboard');
        } else {
            return redirect()->route('teacher.login')->with('fail'.'Incorrect credentials');
        }
    }

    public function logout()
    {
        Auth::guard('teacher')->logout();
        return redirect('/');
    }
}
