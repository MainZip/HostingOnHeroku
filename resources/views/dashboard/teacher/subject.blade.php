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
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">View Subject</h4>
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addSubjectModal">
                                <i class="fa fa-plus"></i>
                                Add Subject
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--Add Modal -->
                        <div class="modal fade" id="addSubjectModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                            Add</span>
                                            <span class="fw-light">
                                                Subject
                                            </span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('teacher.save-subject') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <p class="small">Create a new Subject using this form, make sure you fill them all</p>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Subject</label>
                                                        <input type="text" name="subject" class="form-control subject" placeholder="Enter Subject" autofocus>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Semester</label>
                                                        <select name="semester" class="form-select form-control semester">
                                                            <option selected disabled >Select Semester</option>
                                                            <option value="1st Semester">1st Semester</option>
                                                            <option value="2nd Semester">2nd Semester</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group form-group-default">
                                                        <label>S.Y</label>
                                                        <input type="text" name="sy" class="form-control sy" placeholder="Enter S.Y">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer no-bd">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            @if (count($subjects) > 0)
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Subject</th>
                                            <th>Semester</th>
                                            <th>S.Y</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Subject</th>
                                            <th>Semester</th>
                                            <th>S.Y</th>
                                            <th>Course</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($subjects as $key => $subject)
                                            <tr>
                                                <input type="hidden" class="sub_delete_btn" value="{{ $subject->id }}">
                                                <td>{{ $key+1 }}</td>
                                                <td><a href="{{ url('/teacher/subject/'.$subject->slug.'='.$hash->encodeHex($subject->id)) }}" style="text-decoration:none;">{{ $subject->subject }}</a></td>
                                                <td>{{ $subject->semester }}</td>
                                                <td>{{ $subject->sy }}</td>
                                                <td>
                                                    <input data-id="{{$subject->id}}" class="toggle-class" type="checkbox"
                                                    data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                                    data-on="Active" data-off="InActive" {{ $subject->status ? 'checked' : '' }}>
                                                </td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="{{ url('/teacher/subject/edit-subject/'.$hash->encodeHex($subject->id)) }}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Subject">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger deletebtn" data-original-title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                        <a href="{{ url('/teacher/subject/'.$subject->slug.'/'.'view-assign-student/'.$hash->encodeHex($subject->id)) }}" data-toggle="tooltip" class="btn btn-link btn-primary btn-lg" data-original-title="View Assign Student">
                                                            <i class="fas fa-user-edit"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="text-center">
                                    <p>You have no Subject posts</p>
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
            $('.toggle-class').change(function() {

                var status = $(this).prop('checked') == true ? 1 : 0;
                var subject_id = $(this).data('id');
                $.ajax({

                    type: "GET",
                    dataType: "json",
                    url: '{{ route('teacher.subject-status') }}',
                    data: {'status': status, 'subject_id': subject_id},
                    success: function(data){
                        if(status == 1)
                        {
                            alertify.success(data.success);
                        }
                        else if(status == 0)
                        {
                            alertify.error(data.error);
                        }
                    }
                });
            })

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.deletebtn', function(e){
                e.preventDefault();

                var delete_id = $(this).closest("tr").find('.sub_delete_btn').val();
                // alert(sub_id);
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Subject!",
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
                            url: 'subject/delete-subject/'+delete_id,
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
