<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hashids\Hashids;
use App\Models\Question;
use App\Models\Exam;

class QuestionController extends Controller
{
    public function add($slug, $id)
    {
        $hash = new Hashids('', 10);
        $exams = Exam::where('id', $hash->decodeHex($id))->where('teacher_id', auth()->user()->id)->get()->first();
        if($exams <= $id){
            return redirect()->back();
        }

        return view('dashboard.teacher.exam.add-question', compact('exams', 'hash'));
    }

    public function save(Request $request, $slug, $id)
    {
        $exams_id = $request->exams_id;
        $type = $request->type;
        $question = $request->question;
        $options = json_encode(array('cho1'=>$request->cho1, 'cho2'=>$request->cho2,
                                     'cho3'=>$request->cho3, 'cho4'=>$request->cho4));
        $answer = $request->answer;

        for ($i=0; $i < count($exams_id); $i++){

            $questions = new Question;
            $questions->exams_id = $request->exams_id[$i];
            $questions->type = $request->type[$i];
            $questions->question = $request->question[$i];
            $questions->options=json_encode(array('cho1'=>$request->cho1[$i], 'cho2'=>$request->cho2[$i],
                                                  'cho3'=>$request->cho3[$i], 'cho4'=>$request->cho4[$i]));
            $questions->answer = $request->answer[$i];
            $questions->save();
        }

        Session::flash('statuscode','success');
        return redirect(url('/teacher/exam/'.$slug.'='.$id))->with('status', 'Question Addedd Successfully');
    }

    public function update(Request $request, $id)
    {
        $questions = Question::find($id);
        // $questions->exams_id = $request->input('exams_id');
        $questions->question = $request->input('question');
        $questions->options=json_encode(array('cho1'=>$request->input('cho1'), 'cho2'=>$request->input('cho2'),
                                              'cho3'=>$request->input('cho3'), 'cho4'=>$request->input('cho4')));
        $questions->answer = $request->input('answer');
        $questions->update();

        Session::flash('statuscode','success');
        return redirect()->back()->with('status', 'Question Updated Successfully');
    }
    public function delete($id)
    {
        $questions = Question::find($id);
        $questions->delete();
        return response()->json([
            'status'=>'Question Deleted Successfully',
        ]);
    }
}
