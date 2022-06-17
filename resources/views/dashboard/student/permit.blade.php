@extends('layout.student')

@section('title')
    Permit
@endsection

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Permit</h4>
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
                    <a href="#">Permit</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">View Permit</h4>
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#uploadPermitModal">
                                <i class="fa fa-plus"></i>
                                Upload Permit
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--Add Modal -->
                        <div class="modal fade" id="uploadPermitModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                            Upload</span>
                                            <span class="fw-light">
                                                Permit
                                            </span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('student.upload-permits') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <p class="small">Upload a Permit using this form, make sure you fill them all</p>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Semester</label>
                                                        <select name="semester" class="form-select form-control" required>
                                                            <option selected disabled >Select Semester</option>
                                                            <option value="1st Semester">1st Semester</option>
                                                            <option value="2nd Semester">2nd Semester</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Term</label>
                                                        <select name="term" class="form-select form-control" required>
                                                            <option selected disabled >Select Term</option>
                                                            <option value="Prelim">Prelim</option>
                                                            <option value="Midterm">Midterm</option>
                                                            <option value="Semi-Finals">Semi-Finals</option>
                                                            <option value="Finals">Finals</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Course</label>
                                                        <select name="course" class="form-select form-control" required>
                                                            <option selected disabled >Select Course</option>
                                                            <option value="ACT">ACT</option>
                                                            <option value="BSIT">BSIT</option>
                                                            <option value="BSBA">BSBA</option>
                                                            <option value="BSED">BSED</option>
                                                            <option value="BEED">BEED</option>
                                                            <option value="BSHRM">BSHRM</option>
                                                            <option value="BSTM">BSTM</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group form-group-default">
                                                        <label>S.Y</label>
                                                        <input type="text" name="sy" class="form-control sy" placeholder="Enter S.Y" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Permit</label>
                                                        <input type="file" name="permit" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer no-bd">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save Permit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            @if (count($permits) > 0)
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead >
                                        <tr>
                                            <th>#</th>
                                            <th>Permit</th>
                                            <th>Semester</th>
                                            <th>Term</th>
                                            <th>School Year</th>
                                            <th>Course</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot >
                                        <tr>
                                            <th>#</th>
                                            <th>Permit</th>
                                            <th>Semester</th>
                                            <th>Term</th>
                                            <th>School Year</th>
                                            <th>Course</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($permits as $key => $permit)
                                        <tr>
                                            <input type="hidden" class="delete_btn" value="{{ $permit->id }}">
                                            <td>{{ $key+1 }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/students/'.$permit->permit) }}" width="80px" height="80px" alt="Image">
                                            </td>
                                            <td>{{ $permit->semester }}</td>
                                            <td>{{ $permit->term }}</td>
                                            <td>{{ $permit->sy }}</td>
                                            <td>{{ $permit->course }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ url('student/permit/edit-permits/'.$hash->encodeHex($permit->id)) }}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Subject">
                                                        <i class="fa fa-edit"></i>
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
                                    <p>You have no upload permit</p>
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
            $(document).on('click', '.deletebtn', function(e){
                e.preventDefault();

                var delete_id = $(this).closest("tr").find('.delete_btn').val();
                // alert(sub_id);
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Permit!",
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
                            url: '/student/delete-permit/'+delete_id,
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
