<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hashids\Hashids;
use App\Models\Response;
use App\Models\Student;

class ResultController extends Controller
{
    public function index()
    {
        $hash = new Hashids('', 10);
        $responses = Response::with('exams.assignstudent.examlink.subject')->get();
        $student_id = auth()->user()->id;
        $students = Student::find($student_id);

        // dd($responses);
        return view('dashboard.student.result', compact('responses','students', 'hash'))->with('responses', $students->response);
    }
    public function getIDResponse($id)
    {
        $hash = new Hashids('', 10);
        $responses = Response::with('exams')->where('id', $hash->decodeHex($id))->where('student_id', auth()->user()->id)->get()->first();
        if($responses <= $id){
            return redirect()->back();
        }
        return view('dashboard.student.result.view-result-detail', compact('responses'));
    }
}
