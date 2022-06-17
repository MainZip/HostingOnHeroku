@extends('layout.student')

@section('title')
    Result Detail
@endsection

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Result</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Result</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Result Detail</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">View Result Detail</h4>
                            <a href="/student/result" class="btn btn-primary btn-round ml-auto float-left">
                                Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col"></div>
                                <div class="col-md-7">
                                    <div class="form-control">
                                        <h2>Basic Information</h2>
                                        <table class="table">
                                            <tr>
                                                <td>Name</td>
                                                <td>{{ Auth::user()->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>{{ Auth::user()->email }}</td>
                                            </tr>
                                            <tr>
                                                <td>Exam Name</td>
                                                <td>{{ $responses->exams->title }}</td>
                                            </tr>
                                            <tr>
                                                <td>Exam Date</td>
                                                <td>{{ $responses->exams->date }}</td>
                                            </tr>
                                        </table>
                                        <h2>Result Information</h2>
                                        <table class="table">
                                            <tr>
                                                <td>Pass Marks</td>
                                                <td>{{ $responses->right_ans }}</td>
                                            </tr>
                                            <tr>
                                                <td>Fail Marks</td>
                                                <td>{{ $responses->wrong_ans }}</td>
                                            </tr>
                                            <tr>
                                                <td>Total</td>
                                                <td>{{ $responses->right_ans + $responses->wrong_ans}}</td>
                                            </tr>
                                        </table>
                                        <h2>Total Score and Percentage</h2>
                                        <table class="table">
                                            <tr>
                                                <td>Score</td>
                                                <td>{{ $responses->right_ans.'/'.($responses->right_ans+$responses->wrong_ans) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Percent</td>
                                                <td>{{ ($responses->right_ans*100)/($responses->right_ans+$responses->wrong_ans) }}%</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
