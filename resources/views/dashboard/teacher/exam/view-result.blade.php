@extends('layout.teacher')

@section('title')
    Result
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
                    <a href="#">Exam</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Result</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">View Result</h4>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            @if (count($responses) > 0)
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student</th>
                                            <th>Exam Title</th>
                                            <th>Course</th>
                                            <th>School Year</th>
                                            <th>Score</th>
                                            <th>Percent</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Student</th>
                                            <th>Exam Title</th>
                                            <th>Course</th>
                                            <th>School Year</th>
                                            <th>Score</th>
                                            <th>Percent</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($responses as $key => $response)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $response->student->firstname }} {{ $response->student->lastname }}</td>
                                                <td>{{ $response->exams->title }}</td>
                                                <td>{{ $response->student->course }}</td>
                                                <td>{{ $response->student->schoolyear }}</td>
                                                <th><h3>{{ $response->right_ans.'/'.($response->right_ans+$response->wrong_ans) }}</h3></th>
                                                <th><h3>{{ ($response->right_ans*100)/($response->right_ans+$response->wrong_ans) }}%</h3></th>
                                                <td>
                                                    <div class="form-button-action">
                                                        <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger deletebtn" data-original-title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="text-center">
                                    <p>No Data Available</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{-- <script >
        $(document).ready(function() {

        });
    </script> --}}
@endsection
