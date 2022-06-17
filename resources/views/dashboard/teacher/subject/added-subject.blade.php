@extends('layout.teacher')

@section('title')
    {{ $subjects->subject }}
@endsection


@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">{{ $subjects->subject }}</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('teacher.dashboard') }}">
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
            </ul>
            <a href="/teacher/subject" class="btn btn-primary btn-round ml-auto float-left">
                Back
            </a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">View Added Student</h4>
                            <a href="{{ url('/teacher/subject/'.$subjects->slug.'/'.'add-student/'.$hash->encodeHex($subjects->id)) }}" class="btn btn-primary btn-round ml-auto">
                                <i class="fa fa-plus"></i>
                                Add Student
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if (count($examlinks) > 0)
                                <table id="add-row" class="display table table-striped table-hover">
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
                                        @foreach ($examlinks as $key => $examlink)
                                            <tr>
                                                <input type="hidden" class="delete_btn" value="{{ $hash->encodeHex($examlink->id) }}">
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $examlink->student->firstname }} {{ $examlink->student->lastname }}</td>
                                                <td>{{ $examlink->student->email }}</td>
                                                <td>{{ $examlink->student->course }}</td>
                                                <td>{{ $examlink->student->schoolyear }}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="{{ url('/teacher/subject/'.$examlink->subject->slug.'/'.'assign-student/'.$hash->encodeHex($examlink->id)) }}" class="btn btn-link btn-primary btn-lg">
                                                            <i class="fas fa-user-edit"></i>
                                                        </a>
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
                                    <p>No Student Available</p>
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
    <script >
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.deletebtn', function(e){
                e.preventDefault();

                var delete_id = $(this).closest("tr").find('.delete_btn').val();
                // alert(sub_id);
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Student!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        var data = {
                            "_token": $('input[name=_token]').val(),
                            "id": delete_id,
                        };

                        $.ajax({
                            type: "DELETE",
                            url: '/teacher/subject/delete-student/'+delete_id,
                            data: data,
                            success: function (response) {
                                swal(response.status, {
                                    icon: "success",
                                })
                                .then((result) => {
                                    location.reload();
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
