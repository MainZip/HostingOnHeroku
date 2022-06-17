@extends('layout.teacher')

@section('title')
    Subject
@endsection

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Subject</h4>
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
                    <a href="#">Subject</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Subject</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Add Subject</h4>
                            <a href="/teacher/subject" class="btn btn-primary btn-round ml-auto">
                                Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('teacher/subject/update-subject/'.$subjects->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="text" class="form-control" name="subject" id="subject" value="{{ $subjects->subject }}" placeholder="Enter Subject">
                                    </div>
                                    <div class="form-group">
                                        <label>Semester</label>
                                        <select class="form-control" name="semester" id="semester">
                                            <option selected hidden>{{ $subjects->semester }}</option>
                                            <option value="1st Semester">1st Semester</option>
                                            <option value="2st Semester">2st Semester</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>School Year</label>
                                        <input type="text" class="form-control" name="sy" id="sy" value="{{ $subjects->sy }}" placeholder="Enter School Year">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="form-control btn btn-primary">Update</button>
                                    </div>
                                </div>
                                <div class="col"></div>
                            </div>
                        </form>
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
