<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Hashids\Hashids;
use App\Models\Question;
use App\Models\Assignstudent;
use App\Models\Response;
use App\Models\Exam;

class QuestionController extends Controller
{
    public function question($slug, $id)
    {
        $hash = new Hashids('', 10);
        $assignstudents = Assignstudent::where('student_id', auth()->user()->id)->where('exams_id', $hash->decodeHex($id))->get()->first();
        try {
            $responses = Response::where('exams_id', $assignstudents->exams_id)->where('student_id', auth()->user()->id)->get()->first();
        }
        catch (\Exception $e) {
            return redirect()->back();
        }
        if ($responses) {
            Session::flash('statuscode','info');
            return redirect()->back()->with('status', 'You already Answer this Question');
        }
        $exams = Exam::where('id', $hash->decodeHex($id))->get()->first();
        $questions = Question::where('exams_id', $hash->decodeHex($id))->orderBy('id','desc')->get();
        if ($assignstudents <= $id) {
            return redirect()->back();
        }

        return view('dashboard.student.exam.question', compact('exams','questions', 'responses', 'hash'));
    }

    public function submitquestion(Request $request)
    {
        $hash = new Hashids('', 10);
        $right_ans = 0;
        $wrong_ans = 0;
        $data = $request->all();
        $result=array();
        for($i=1;$i<=$request->index;$i++)
        {
            if(isset($data['question'.$i]))
            {
                $question = Question::where('id', $data['question'.$i])->get()->first();
                if($question->answer==$data['choices'.$i])
                {
                    $result[$data['question'.$i]]='YES';
                    $right_ans++;
                }
                else
                {
                    $result[$data['question'.$i]]='NO';
                    $wrong_ans++;
                }
            }
        }
        $res = new Response();
        $res->teacher_id=$request->teacher_id;
        $res->exams_id=$request->exams_id;
        $res->student_id=Auth::user()->id;
        $res->right_ans=$right_ans;
        $res->wrong_ans=$wrong_ans;
        $res->result_json=json_encode($result);
        $res->save();
        return redirect(url('student/exam/question/show_result='.$hash->encodeHex($res->id)));
    }

    public function showresult($id)
    {
        $hash = new Hashids('', 10);
        $responses = Response::with('exams')->where('id',$hash->decodeHex($id))->get()->first();
        // dd($responses);
        return view('dashboard.student.exam.show-result', compact('responses', 'hash'));
    }
}
