<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Hashids\Hashids;
use App\Models\Exam;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Question;
use App\Models\Response;

class ExamController extends Controller
{
    public function index()
    {
        $hash = new Hashids('', 10);
        $teacher_id = auth()->user()->id;
        $exams = Exam::with('teacher')->get();
        $teachers = Teacher::find($teacher_id);
        return view('dashboard.teacher.exam', compact('exams', 'teachers', 'hash'))->with('exams', $teachers->exam);
    }
    public function save(Request $request)
    {
        $exams = new Exam;
        $exams->teacher_id = auth()->user()->id;
        $exams->title = $request->input('title');
        $exams->slug = SlugService::createSlug(Exam::class, 'slug', $request->title);
        $exams->date = $request->input('date');
        $exams->duration = $request->input('duration');
        $exams->save();

        Session::flash('statuscode','success');
        return redirect()->back()->with('status', 'Exam added Successfully');
    }

    public function ChangeStatus(Request $request)
    {
        $exams = Exam::find($request->exam_id);
        $exams->status = $request->status;
        $exams->save();

        return response()->json([
            'success'=>'Status change into active.',
            'error'=>'Status change into Inactive.'
        ]);
    }
    public function edit($id)
    {
        $exams = Exam::find($id);

        return response()->json([
            'status'=>200,
            'exams'=>$exams,
        ]);
    }
    public function update(Request $request)
    {
        $ex_id = $request->input('ex_id');
        $exams = Exam::find($ex_id);
        $exams->title = $request->input('title');
        $exams->date = $request->input('date');
        $exams->duration = $request->input('duration');
        $exams->update();

        Session::flash('statuscode','success');
        return redirect()->back()->with('status', 'Subject Updated Successfully');
    }
    public function delete($id)
    {
        $exams = Exam::find($id);
        $exams->delete();
        return response()->json([
            'status'=>'Title Exams Deleted Successfully',
        ]);
    }
    public function getIdDetail($slug, $id){
        $hash = new Hashids('', 10);
        // $exams = Exam::find($id);
        $questions = Question::where('exams_id', $hash->decodeHex($id))->get();
        $exams = Exam::where('id', $hash->decodeHex($id))->where('teacher_id', auth()->user()->id)->get()->first();
        if($exams <= $id){
            return redirect()->back();
        }
        else
        {
            return view('dashboard.teacher.exam.question', compact('questions', 'exams', 'hash'));
        }
    }
    public function result($slug, $id){

        $hash = new Hashids('', 10);
        $responses = Response::with('student', 'exams')->where('exams_id', $hash->decodeHex($id))->get();
        $exams = Exam::where('id', $hash->decodeHex($id))->where('teacher_id', auth()->user()->id)->get()->first();

        if($exams <= $id){
            return redirect()->back();
        }
        else
        {
            return view('dashboard.teacher.exam.view-result', compact('responses', 'hash'));
        }
    }
}
