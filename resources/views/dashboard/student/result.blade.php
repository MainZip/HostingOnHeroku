@extends('layout.student')

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
                    <a href="#">Result</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">View all Result</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if (count($responses) > 0)
                            <table id="add-row" class="display table table-striped table-hover" >
                                <thead >
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Exam Title</th>
                                        <th>Exam Date</th>
                                        <th>Score</th>
                                        <th>Percent</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot >
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Exam Title</th>
                                        <th>Exam Date</th>
                                        <th>Score</th>
                                        <th>Percent</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($responses as $key => $response)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</td>
                                            <td>{{ $response->exams->title }}</td>
                                            <td>{{ $response->exams->date }}</td>
                                            <td><h3>{{ $response->right_ans.'/'.($response->right_ans+$response->wrong_ans) }}</h3></td>
                                            <td><h3>{{ ($response->right_ans*100)/($response->right_ans+$response->wrong_ans) }}%</h3></td>
                                            <td>
                                                <a href="{{ url('/student/result/view-result-detail/'.$hash->encodeHex($response->id)) }}" data-toggle="tooltip" title="" class="btn btn-primary btn-sm" data-original-title="View Result Detail">
                                                    View Result Detail
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                <div class="text-center">
                                    <p>Dont have Result Record</p>
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
@endsection

