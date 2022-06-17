<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assignstudent;
use App\Models\Permit;
use App\Models\Response;

class DashboardController extends Controller
{
    public function index()
    {
        $assignstudents = Assignstudent::where('student_id', auth()->user()->id)->count();
        $permits = Permit::where('student_id', auth()->user()->id)->count();
        $responses = Response::where('student_id', auth()->user()->id)->count();

        return view('dashboard.student.dashboard', compact('assignstudents', 'permits', 'responses'));
    }
}
