@extends('layout.student')

@section('title')
    Exam
@endsection

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Exam</h4>
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
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">View Exam</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if (count($assignstudents) > 0)
                            <table id="add-row" class="display table table-striped table-hover" >
                                <thead >
                                    <tr>
                                        <th>#</th>
                                        <th>Teacher</th>
                                        <th>Semester</th>
                                        <th>Subject</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot >
                                    <tr>
                                        <th>#</th>
                                        <th>Teacher</th>
                                        <th>Semester</th>
                                        <th>Subject</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($assignstudents as $key => $assignstudent)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>
                                                @if ($assignstudent->examlink->subject->teacher->gender == 'Male')
                                                    Sir {{ $assignstudent->examlink->subject->teacher->firstname }} {{ $assignstudent->examlink->subject->teacher->lastname }}
                                                @else
                                                    Maam {{ $assignstudent->examlink->subject->teacher->firstname }} {{ $assignstudent->examlink->subject->teacher->lastname }}
                                                @endif
                                            </td>
                                            <td>{{ $assignstudent->examlink->subject->semester }}</td>
                                            <td>{{ $assignstudent->examlink->subject->subject }}</td>
                                            <td>
                                                @if ($assignstudent->examlink->subject->status == 1)
                                                    <span class="badge badge-success rounded-pill d-inline">Active</span>
                                                @else
                                                    <span class="badge badge-danger rounded-pill d-inline">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($assignstudent->examlink->subject->status == 1)
                                                    <div class="text-center">
                                                        <a href="{{ url('student/exam/join-exam/'.$hash->encodeHex($assignstudent->id)) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-original-title="Join Exam">Join Exam</a>
                                                    </div>
                                                @else
                                                    <div class="text-center">
                                                        <button class="btn btn-primary btn-sm not_allowed" data-toggle="tooltip" data-original-title="Join Exam">Join Exam</button>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                <div class="text-center">
                                    <p>You have no exam</p>
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
    <script>
        $(document).ready(function() {

            $('.toggle-class').change(function() {

                var status = $(this).prop('checked') == true ? 1 : 0;
                var assing_id = $(this).data('id');
                $.ajax({

                    type: "GET",
                    dataType: "json",
                    url: '{{ route('student.assign-status') }}',
                    data: {'status': status, 'assing_id': assing_id},
                    success: function(data){
                        if(status == 1)
                        {
                            alertify.success(data.success);
                            window.location.reload();
                        }
                        else if(status == 0)
                        {
                            alertify.error(data.error);
                            window.location.reload();
                        }
                    }
                });
            })

            $(document).on('click','.not_allowed', function(e){
                e.preventDefault();
                alertify.alert().set('message', 'Status is Inactive!').show();
            });
        });
    </script>
@endsection
