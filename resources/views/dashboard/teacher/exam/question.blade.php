@extends('layout.teacher')

@section('title')
    Question
@endsection

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Question</h4>
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
                    <a href="#">Question</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">{{ $exams->title }}</h4>
                            <a href="{{ url('/teacher/exam/'.$exams->slug.'/'.'add-question/'.$hash->encodeHex($exams->id)) }}" class="btn btn-primary btn-round ml-auto">
                                <i class="fa fa-plus"></i>
                                Add Question
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if (count($questions) > 0)
                            <table id="add-row" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Question</th>
                                        <th>Type</th>
                                        <th>Choices</th>
                                        <th>Answer</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Question</th>
                                        <th>Type</th>
                                        <th>Choices</th>
                                        <th>Answer</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($questions as $key => $question)

                                    <tr>
                                        <input type="hidden" class="delete_btn" value="{{ $question->id }}">
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $question->question }}</td>
                                        <td>{{ $question->type }}</td>
                                        @php
                                            $options=json_decode(json_encode(json_decode($question['options'])),true);
                                        @endphp
                                        @if ($question->type == 'Multiple Choice')
                                            <td>
                                                A. &nbsp;{{ $options['cho1'] }} <br />
                                                B. &nbsp;{{ $options['cho2'] }} <br />
                                                C. &nbsp;{{ $options['cho3'] }} <br />
                                                D. &nbsp;{{ $options['cho4'] }}
                                            </td>
                                        @else
                                            <td>
                                                True
                                                <br/>
                                                False
                                            </td>
                                        @endif
                                        <td>{{ $question->answer }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                @if ($question->type == 'Multiple Choice')
                                                    <button class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#editMCQuestionModal{{ $question->id }}">
                                                        <i class="fa fa-edit" data-toggle="tooltip" data-original-title="Edit Question"></i>
                                                    </button>
                                                @else
                                                    <button class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#editTOFQuestionModal{{ $question->id }}">
                                                        <i class="fa fa-edit" data-toggle="tooltip" data-original-title="Edit Question"></i>
                                                    </button>
                                                @endif
                                                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger deletebtn" data-original-title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    @include('dashboard.teacher.exam.inc.mc-edit-question')
                                    @include('dashboard.teacher.exam.inc.tof-edit-question')

                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                <div class="text-center">
                                    <p>You have no Question</p>
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
                    text: "Once deleted, you will not be able to recover this Question!",
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
                            url: '/teacher/exam/delete-question/'+delete_id,
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
