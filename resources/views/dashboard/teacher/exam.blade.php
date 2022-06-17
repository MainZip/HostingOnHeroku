@extends('layout.teacher')

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
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                <i class="fa fa-plus"></i>
                                Add Exam
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--Add Modal -->
                        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                            Add</span>
                                            <span class="fw-light">
                                                Exam
                                            </span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('teacher.add-exam') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <p class="small">Create a new Exam using this form, make sure you fill them all</p>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Title</label>
                                                        <input type="text" name="title" class="form-control" placeholder="Enter Title Exam" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group form-group-default">
                                                        <label>Date</label>
                                                        <input type="date" name="date" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Duration</label>
                                                        <select name="duration" class="form-select form-control duration" required>
                                                            <option selected disabled >Select Duration</option>
                                                            <option value="5">5 Minutes</option>
                                                            <option value="30">30 Minutes</option>
                                                            <option value="50">50 Minutes</option>
                                                            <option value="60">60 Minutes</option>
                                                        </select>
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

                        <!--Edit Modal -->
                        <div class="modal fade" id="editRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                            Add</span>
                                            <span class="fw-light">
                                                Exam
                                            </span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('teacher.update-exam') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" id="ex_id" name="ex_id"/>
                                        <div class="modal-body">
                                            <p class="small">Create a new Exam using this form, make sure you fill them all</p>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Title</label>
                                                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title Exam" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group form-group-default">
                                                        <label>Date</label>
                                                        <input type="date" name="date" id="date" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Duration</label>
                                                        <select name="duration" id="duration" class="form-select form-control duration" required>
                                                            <option selected disabled >Select Duration</option>
                                                            <option value="05">5 Minutes</option>
                                                            <option value="30">30 Minutes</option>
                                                            <option value="50">50 Minutes</option>
                                                            <option value="60">60 Minutes</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer no-bd">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            @if (count($exams) > 0)
                            <table id="add-row" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Duration</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Duration</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($exams as $key => $exam )
                                    <tr>
                                        <input type="hidden" class="exam_delete_btn" value="{{ $exam->id }}">
                                        <td>{{ $key+1 }}</td>
                                        <td><a href="{{ url('/teacher/exam/'.$exam->slug.'='.$hash->encodeHex($exam->id)) }}" style="text-decoration:none;">{{ $exam->title }}</a></td>
                                        <td>{{ $exam->date }}</td>
                                        <td>{{ $exam->duration }} Minutes</td>
                                        <td>
                                            <input data-id="{{$exam->id}}" class="toggle-class" type="checkbox"
                                            data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                            data-on="Active" data-off="InActive" {{ $exam->status ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" value="{{ $exam->id }}" data-toggle="tooltip" title="" class="btn btn-link btn-primary editbtn btn-lg" data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger deletebtn" data-original-title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <a href="{{ url('/teacher/exam/'.$exam->slug.'/'.'view-result/'.$hash->encodeHex($exam->id)) }}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="View Score Result">
                                                    <i class="fas fa-bell"></i>
                                                </a>
                                            </div>
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
    <script >
        $(document).ready(function() {

            $('.toggle-class').change(function() {

                var status = $(this).prop('checked') == true ? 1 : 0;
                var exam_id = $(this).data('id');
                $.ajax({

                    type: "GET",
                    dataType: "json",
                    url: '{{ route('teacher.change-status') }}',
                    data: {'status': status, 'exam_id': exam_id},
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

            $(document).on('click', '.editbtn', function(){

                var ex_id = $(this).val();
                // alert(sub_id);
                $('#editRowModal').modal('show');

                $.ajax({
                    type: "GET",
                    url: "/teacher/edit-exam/"+ex_id,
                    success: function(response){
                        // console.log(response);
                        $('#title').val(response.exams.title);
                        $('#date').val(response.exams.date);
                        $('#duration').val(response.exams.duration);
                        $('#ex_id').val(ex_id);
                    }
                });
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.deletebtn', function(e){
                e.preventDefault();

                var delete_id = $(this).closest("tr").find('.exam_delete_btn').val();
                // alert(sub_id);
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Exam!",
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
                            url: 'delete-exam/'+delete_id,
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
