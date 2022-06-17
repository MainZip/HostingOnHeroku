@extends('layout.student')

@section('title')
    Join Exam
@endsection

@section('script')
    <style>
        .scrollbar-deep-purple::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #F5F5F5;
            border-radius: 10px;
        }

        .scrollbar-deep-purple::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        .scrollbar-deep-purple::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #512da8;
        }

        .scrollbar-deep-purple {
            scrollbar-color: #512da8 #F5F5F5;
        }

        .scrollbar-cyan::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #F5F5F5;
            border-radius: 10px;
        }

        .scrollbar-cyan::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        .scrollbar-cyan::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #00bcd4;
        }

        .scrollbar-cyan {
            scrollbar-color: #00bcd4 #F5F5F5;
        }

        .scrollbar-dusty-grass::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #F5F5F5;
            border-radius: 10px;
        }

        .scrollbar-dusty-grass::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        .scrollbar-dusty-grass::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-image: -webkit-linear-gradient(330deg, #d4fc79 0%, #96e6a1 100%);
            background-image: linear-gradient(120deg, #d4fc79 0%, #96e6a1 100%);
        }

        .scrollbar-ripe-malinka::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #F5F5F5;
            border-radius: 10px;
        }

        .scrollbar-ripe-malinka::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        .scrollbar-ripe-malinka::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-image: -webkit-linear-gradient(330deg, #f093fb 0%, #f5576c 100%);
            background-image: linear-gradient(120deg, #f093fb 0%, #f5576c 100%);
        }

        .bordered-deep-purple::-webkit-scrollbar-track {
            -webkit-box-shadow: none;
            border: 1px solid #512da8;
        }

        .bordered-deep-purple::-webkit-scrollbar-thumb {
            -webkit-box-shadow: none;
        }

        .bordered-cyan::-webkit-scrollbar-track {
            -webkit-box-shadow: none;
            border: 1px solid #00bcd4;
        }

        .bordered-cyan::-webkit-scrollbar-thumb {
            -webkit-box-shadow: none;
        }

        .square::-webkit-scrollbar-track {
            border-radius: 0 !important;
        }

        .square::-webkit-scrollbar-thumb {
            border-radius: 0 !important;
        }

        .thin::-webkit-scrollbar {
            width: 6px;
        }

        .example-1 {
            position: relative;
            overflow-y: scroll;
            height: 400px;
        }
    </style>
@endsection

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Join Exam</h4>
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
                    <a href="#">Exam</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Join Exam</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">View Exam</h4>
                            <a href="/student/exam" class="btn btn-primary btn-round ml-auto float-left">
                                Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($responses)
                        <!-- Modal -->
                        <div class="modal fade" id="resultModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Result</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body example-1 scrollbar-deep-purple bordered-deep-purple thin">
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
                                                <td>Exam Title</td>
                                                <td>{{ $assignstudents->exam->title }}</td>
                                            </tr>
                                            <tr>
                                                <td>Exam Date</td>
                                                <td>{{ $assignstudents->exam->date }}</td>
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
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover" >
                                <thead >
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Duration</th>
                                        <th>Status</th>
                                        <th>Score</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot >
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Duration</th>
                                        <th>Status</th>
                                        <th>Score</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>{{ $assignstudents->exam->key+1 }}</td>
                                        <td>{{ $assignstudents->exam->title }}</td>
                                        <td>{{ $assignstudents->exam->date }}</td>
                                        <td>{{ $assignstudents->exam->duration }} Minutes</td>
                                        <td>
                                            @if (strtotime($assignstudents->exam->date)==strtotime(date('Y-m-d')))
                                                @if ($responses)
                                                    <span class="badge badge-success rounded-pill d-inline">Completed</span>
                                                @else
                                                    <span class="badge badge-primary rounded-pill d-inline">Running</span>
                                                @endif
                                            @elseif (strtotime($assignstudents->exam->date)<strtotime(date('Y-m-d')))
                                                @if (!$responses)
                                                    <span class="badge badge-danger rounded-pill d-inline">Pending</span>
                                                @else
                                                    <span class="badge badge-success rounded-pill d-inline">Completed</span>
                                                @endif
                                            @else
                                                <span class="badge badge-warning rounded-pill d-inline">Ongoing</span>
                                            @endif
                                        </td>
                                        <th>
                                            @if ($responses)
                                                <div>{{ $responses->right_ans.'/'.($responses->right_ans+$responses->wrong_ans) }}</div>
                                            @endif
                                        </th>
                                        <td>
                                            <?php
                                            if (strtotime($assignstudents->exam->date)==strtotime(date('Y-m-d')))
                                            {
                                                if(!$responses) {

                                            ?>
                                            <a href="{{ url('/student/exam/'.$assignstudents->exam->slug.'='.$hash->encodeHex($assignstudents->exam->id)) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-original-title="Answer Question">
                                                Answer Question
                                            </a>
                                            <?php } } ?>
                                            @if ($responses)
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#resultModal">View Result Detail</button>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
