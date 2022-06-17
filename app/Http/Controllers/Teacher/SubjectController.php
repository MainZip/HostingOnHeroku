<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Hashids\Hashids;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Examlink;
use App\Models\Exam;
use App\Models\Assignstudent;

class SubjectController extends Controller
{
    public function index()
    {
        $hash = new Hashids('', 10);
        $subjects = Subject::with('teacher')->get();
        $teacher_id = auth()->user()->id;
        $teachers = Teacher::find($teacher_id);
        return view('dashboard.teacher.subject', compact('subjects','teachers', 'hash'))->with('subjects', $teachers->subject);
    }
    public function save(Request $request)
    {
        $subjects = new Subject;
        $subjects->teacher_id = auth()->user()->id;
        $subjects->subject = $request->input('subject');
        $subjects->slug = SlugService::createSlug(Subject::class, 'slug', $request->subject);
        $subjects->semester = $request->input('semester');
        $subjects->sy = $request->input('sy');
        $subjects->save();

        Session::flash('statuscode','success');
        return redirect()->route('teacher.subject')->with('status', 'Subject added Successfully');
    }
    public function ChangeStatus(Request $request)
    {
        $subjects = Subject::find($request->subject_id);
        $subjects->status = $request->status;
        $subjects->save();

        return response()->json([
            'success'=>'Status change into active.',
            'error'=>'Status change into Inactive.'
        ]);
    }
    public function edit($id)
    {
        $hash = new Hashids('', 10);
        $subjects = Subject::where('id', $hash->decodeHex($id))->where('teacher_id', auth()->user()->id)->get()->first();

        if($subjects <= $id){
            return redirect()->back();
        } else {
            return view('dashboard.teacher.subject.edit-subject', compact('subjects', 'hash'));
        }
    }
    public function update(Request $request, $id)
    {
        $subjects = Subject::find($id);
        $subjects->teacher_id = auth()->user()->id;
        $subjects->subject = $request->input('subject');
        $subjects->slug = Str::slug($request->input('subject'));
        $subjects->semester = $request->input('semester');
        $subjects->sy = $request->input('sy');
        $subjects->update();

        Session::flash('statuscode','success');
        return redirect()->route('teacher.subject')->with('status', 'Subject Updated Successfully');
    }
    public function delete($id)
    {
        $subjects = Subject::find($id);
        $subjects->delete();
        return response()->json([
            'status'=>'Subject Deleted Successfully',
        ]);
    }
    public function getIDSubject($slug, $id){
        $hash = new Hashids('', 10);
        $examlinks = Examlink::with('subject.teacher.exam','student')->where('subject_id', $hash->decodeHex($id))->get();
        $exam = Exam::where('teacher_id', auth()->user()->id)->get();
        $subjects = Subject::where('id', $hash->decodeHex($id))->where('teacher_id', auth()->user()->id)->get()->first();
        $students = Student::all();

        if($subjects <= $hash->decodeHex($id)){
            return redirect()->back();
        } else {
            return view('dashboard.teacher.subject.added-subject', compact('subjects', 'students', 'examlinks', 'hash'));
        }
        // dd($examlinks);
    }
    public function addstudent($slug, $id){

        $hash = new Hashids('', 10);

        $examlinks = Examlink::with('subject.teacher.exam','student')->where('subject_id', $hash->decodeHex($id))->get();
        $exam = Exam::where('teacher_id', auth()->user()->id)->get();
        $subjects = Subject::where('id', $hash->decodeHex($id))->where('teacher_id', auth()->user()->id)->get()->first();
        $students = Student::all();

        if($subjects <= $hash->decodeHex($id)){
            return redirect()->back();
        } else {
            return view('dashboard.teacher.subject.add-student', compact('subjects', 'students', 'examlinks', 'hash'));
        }
    }
    public function viewstudent($slug, $id)
    {
        $hash = new Hashids('', 10);
        $examlinks = Examlink::with('subject.teacher.exam', 'assignstudent.student', 'assignstudent.exam')->where('subject_id', $hash->decodeHex($id))->get();
        $subjects = Subject::where('id', $hash->decodeHex($id))->where('teacher_id', auth()->user()->id)->get()->first();

        // dd($examlinks);

        if($subjects <= $id){
            return redirect()->back();
        } else {
            return view('dashboard.teacher.subject.view-assign-student', compact('examlinks', 'hash'));
        }
    }
    public function deleteAssign($id)
    {
        $hash = new Hashids('', 10);
        $assignstudents = Assignstudent::find($hash->decodeHex($id));
        $assignstudents->delete();
        return response()->json([
            'status'=>'Student Deleted Successfully',
        ]);
    }
}
