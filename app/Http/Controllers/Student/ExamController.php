<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hashids\Hashids;
use App\Models\Assignstudent;
use App\Models\Student;
use App\Models\Question;
use App\Models\Response;

class ExamController extends Controller
{
    public function index()
    {
        $hash = new Hashids('', 10);
        $assignstudents = Assignstudent::with('examlink.subject.teacher', 'exam')->get();
        $student_id = auth()->user()->id;
        $students = Student::find($student_id);
        // dd($assignstudents);
        return view('dashboard.student.exam', compact('assignstudents','students', 'hash'))->with('assignstudents', $students->assignstudent);
    }

    public function join($id)
    {
        $hash = new Hashids('', 10);
        $assignstudents = Assignstudent::with('exam')->where('id', $hash->decodeHex($id))->where('student_id', auth()->user()->id)->get()->first();
        if($assignstudents <= $id){
            return redirect()->back();
        }
        $questions = Question::where('id', $hash->decodeHex($id))->where('exams_id', $assignstudents->exams_id)->get()->first();
        // dd($assignstudents);
        $students = Student::find($hash->decodeHex($id));
        $responses = Response::where('exams_id', $assignstudents->exams_id)->where('student_id', auth()->user()->id)->get()->first();
        return view('dashboard.student.exam.join-exam', compact('students', 'assignstudents', 'responses', 'hash'));
    }
    public function ChangeStatus(Request $request)
    {
        $assignstudents = Assignstudent::find($request->assing_id);
        $assignstudents->status = $request->status;
        $assignstudents->save();

        return response()->json([
            'success'=>'Status change into active.',
            'error'=>'Status change into Inactive.'
        ]);
    }
}
