<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;

class StudentLoginController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'gender'=>'required',
            'course'=>'required',
            'schoolyear'=>'required',
            'email'=>'required|email|unique:teachers,email',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password'
        ]);
        $students = new Student();
        $students->firstname = $request->firstname;
        $students->lastname = $request->lastname;
        $students->gender = $request->gender;
        $students->course = $request->course;
        $students->schoolyear = $request->schoolyear;
        $students->email = $request->email;
        $students->password = \Hash::make($request->password);
        $save = $students->save();

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
            'email'=>'required|email|exists:students,email',
            'password'=>'required|min:5|max:30'
        ]);

        $creds = $request->only('email','password');
        if(Auth::guard('student')->attempt($creds)){
            return redirect()->route('student.dashboard');
        } else {
            return redirect()->route('student.login')->with('fail'.'Incorrect credentials');
        }
    }

    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect('/');
    }
}
