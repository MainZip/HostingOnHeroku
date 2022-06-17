<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Response;
use App\Models\Permit;
use App\Models\Examlink;
use App\Models\Assignstudent;

class DashboardController extends Controller
{
    public function index()
    {
        $exams = Exam::where('teacher_id', auth()->user()->id)->get()->first();
        $responses = Response::where('teacher_id', auth()->user()->id)->count();
        $permits = Permit::count();
        $examlinks = Examlink::where('user', auth()->user()->id)->count();
        $assignstudents = Assignstudent::count();
        // dd($examlinks);
        return view('dashboard.teacher.dashboard', compact('responses', 'permits', 'assignstudents', 'examlinks'));
    }
}
