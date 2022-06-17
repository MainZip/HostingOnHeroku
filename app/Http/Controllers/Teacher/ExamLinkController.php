<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hashids\Hashids;
use App\Models\Examlink;
use App\Models\Exam;
use App\Models\Assignstudent;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Permit;

class ExamLinkController extends Controller
{
    public function store(Request $request ,$slug ,$id)
    {

        foreach($request->student_id as $key => $examlink)
        {
            $examlinks = new Examlink;
            $examlinks->subject_id = $request->subject_id[$key];
            $examlinks->student_id = $request->student_id[$key];
            $examlinks->user = Auth::user()->id;
            $examlinks->save();
        }

        Session::flash('statuscode','success');
        return redirect(url('/teacher/subject/'.$slug.'='.$id))->with('status', 'Student added Successfully');
    }
    public function delete($id)
    {
        $hash = new Hashids('', 10);
        $examlinks = Examlink::find($hash->decodeHex($id));
        $examlinks->delete();
        return response()->json([
            'status'=>'Student Deleted Successfully',
        ]);
    }
    public function assign(Request $request, $slug, $id)
    {
        $hash = new Hashids('', 10);
        $assignstudents = new Assignstudent;
        $assignstudents->examlink_id = $request->examlink_id;
        $assignstudents->student_id = $request->student_id;
        $assignstudents->exams_id = $request->exams_id;
        $assignstudents->save();

        Session::flash('statuscode','success');
        return redirect(url('/teacher/subject/'.$slug.'='.$id))->with('status', 'Assign Student Successfully');
    }

    public function getExamID($slug,$id)
    {
        $hash = new Hashids('', 10);
        $subjects = Subject::with('examlink.student', 'teacher.exam')->where('id', $hash->decodeHex($id))->where('teacher_id', auth()->user()->id)->get()->first();
        $examlinks = Examlink::with('subject.teacher.exam','student')->where('id', $hash->decodeHex($id))->where('user', auth()->user()->id)->get()->first();
        $permits = Permit::where('student_id', $examlinks->student_id)->get();
        $exams = Exam::where('teacher_id', auth()->user()->id)->get();

        if ($examlinks <= $id) {
            return redirect()->back();
        }

        // dd($examlinks == true);
        return view('dashboard.teacher.subject.assign-student', compact('examlinks', 'exams', 'permits', 'hash'));
    }
}
