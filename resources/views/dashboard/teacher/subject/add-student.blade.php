@extends('layout.teacher')

@section('title')
    Add Student
@endsection

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">{{ $subjects->subject }}</h4>
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
                    <a href="#">{{ $subjects->subject }}</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add Student</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Add Student</h4>
                            <a href="{{ url('/teacher/subject/'.$subjects->slug.'='.$hash->encodeHex($subjects->id)) }}" class="btn btn-primary ml-auto">
                                Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/teacher/subject/'.$subjects->slug.'/'.'add-student/'.Request::segment(5)) }}" method="POST">
                            @csrf
                            <div class="table-responsive">
                                @if (count($students) > 0)
                                    <table id="add-row" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Student</th>
                                                <th>Email</th>
                                                <th>Course</th>
                                                <th>College Year</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Student</th>
                                                <th>Email</th>
                                                <th>Course</th>
                                                <th>College Year</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($students as $key => $student)
                                                <tr>
                                                    <input type="hidden" name="subject_id[]" value="{{ $hash->decodeHex(Request::segment(5)) }}">
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $student->firstname }} {{ $student->lastname }}</td>
                                                    <td>{{ $student->email }}</td>
                                                    <td>{{ $student->course }}</td>
                                                    <td>{{ $student->schoolyear }}</td>
                                                    <td><input type="checkbox" name="student_id[]" value="{{ $student->id }}"></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <div class="text-center">
                                        <p>No Student Available</p>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary form-control">Add Student</button>
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
