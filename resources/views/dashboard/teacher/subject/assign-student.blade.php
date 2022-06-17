@extends('layout.teacher')

@section('title')
    Assign Student
@endsection

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">{{ $examlinks->subject->subject }}</h4>
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
                    <a href="#">{{ $examlinks->subject->subject }}</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Assign Student</a>
                </li>
            </ul>
            <a href="{{ url('/teacher/subject/'.$examlinks->subject->slug.'='.$hash->encodeHex($examlinks->subject_id)) }}" class="btn btn-primary ml-auto">
                Back
            </a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">{{ $examlinks->student->firstname }} {{ $examlinks->student->lastname }}</h4>
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#permitModal">
                                {{ $examlinks->student->firstname }}'s Permit
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- Modal -->
                        <div class="modal fade" id="permitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="scroll">
                                            <table class="table table-bordered text-center">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Student</th>
                                                        <th>Permit</th>
                                                        <th>Semester</th>
                                                        <th>Term</th>
                                                        <th>School Year</th>
                                                        <th>Course</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($permits as $key => $permit)
                                                        <tr>
                                                            <td>{{ $key+1 }}</td>
                                                            <td>
                                                                <img src="{{ asset('uploads/students/'.$permit->permit) }}" width="80px" height="80px" alt="Image">
                                                            </td>
                                                            <td>{{ $permit->student->firstname }} {{ $permit->student->lastname }}</td>
                                                            <td>{{ $permit->semester }}</td>
                                                            <td>{{ $permit->term }}</td>
                                                            <td>{{ $permit->sy }}</td>
                                                            <td>{{ $permit->course }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form action="{{ url('/teacher/subject/'.$examlinks->subject->slug.'/'.'assign-exam/'.$hash->encodeHex($examlinks->subject_id)) }}" method="POST">
                            @csrf
                            <input type="hidden" name="examlink_id" value="{{ $hash->decodeHex(Request::segment(5)) }}">
                            <input type="hidden" name="student_id" value="{{ $examlinks->student->id }}">
                            <div class="table-responsive">
                                @if (count($exams) > 0)
                                    <table id="add-row" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Exam Title</th>
                                                <th>Date</th>
                                                <th>Duration</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Exam Title</th>
                                                <th>Date</th>
                                                <th>Duration</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($exams as $key => $exam)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $exam->title }}</td>
                                                    <td>{{ $exam->date }}</td>
                                                    <td>{{ $exam->duration }} Minutes</td>
                                                    <td><input type="checkbox" name="exams_id" value="{{ $exam->id }}"></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <div class="text-center">
                                        <p>You have no Exam posts</p>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary form-control">Assign Student</button>
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
