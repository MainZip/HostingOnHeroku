<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hashids\Hashids;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Models\Permit;
use App\Models\Student;

class PermitsController extends Controller
{
    public function index()
    {
        $hash = new Hashids('', 10);
        $permits = Permit::all();
        $student_id = auth()->user()->id;
        $students = Student::find($student_id);
        return view('dashboard.student.permit', compact('permits', 'students', 'hash'))->with('permits', $students->permit);
    }
    public function save(Request $request)
    {
        $permits = new Permit;
        $permits->student_id = auth()->user()->id;
        $permits->term = $request->input('term');
        $permits->semester = $request->input('semester');
        $permits->sy = $request->input('sy');
        $permits->course = $request->input('course');
        if($request->hasfile('permit'))
        {
            $file = $request->file('permit');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/students/', $filename);
            $permits->permit = $filename;
        }
        $permits->save();

        Session::flash('statuscode','success');
        return redirect()->back()->with('status', 'Permit Added Successfully');
    }
    public function edit($id)
    {
        $hash = new Hashids('', 10);
        $permits = Permit::where('id', $hash->decodeHex($id))->where('student_id', auth()->user()->id)->get()->first();
        if($permits <= $id){
            return redirect()->back();
        }

        return view('dashboard.student.permit.edit', compact('permits'));
    }
    public function update(Request $request, $id)
    {
        $permits = Permit::find($id);
        $permits->term = $request->input('term');
        $permits->semester = $request->input('semester');
        $permits->sy = $request->input('sy');
        $permits->course = $request->input('course');
        if($request->hasfile('permit'))
        {
            $destination = 'uploads/students/'.$permits->permit;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('permit');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/students/', $filename);
            $permits->permit = $filename;
        }
        $permits->update();

        Session::flash('statuscode','success');
        return redirect()->route('student.permit')->with('status', 'Permit updated Successfully');
    }
    public function delete($id)
    {
        $permits = Permit::find($id);
        $destination = 'uploads/students'.$permits->permit;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $permits->delete();

        return response()->json([
            'status'=>'Permit deleted Successfully',
        ]);
    }
}
