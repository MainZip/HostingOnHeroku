<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Response;
use App\Models\Teacher;

class ResponseController extends Controller
{
    public function index()
    {
        $responses =  Response::with('exams')->where('teacher_id', auth()->user()->id)->get();
        $teacher_id = auth()->user()->id;
        $teachers = Teacher::find($teacher_id);

        // dd($exams);
        return view('dashboard.teacher.responses')->with('responses', $teachers->response);
    }
}
