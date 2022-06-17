@extends('layout.teacher')

@section('title')
    Add Question
@endsection

@section('links')
    <style>
        .sticky {
            width: 220px;
            position: fixed;
            top: 75px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
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
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Add Question</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Question</h4>
                                <a href="{{ url('/teacher/exam/'.$exams->slug.'='.$hash->encodeHex($exams->id)) }}" class="btn btn-primary ml-auto">
                                    Back
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/teacher/exam/save-question/'.$exams->slug.'/'.Request::segment(5)) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-9">
                                        <div id="show-question">
                                            <div class="card border rowcount mt-3" id="card">
                                                <div class="card-body">
                                                    <div class="form-group row add-question">
                                                        <input type="hidden" name="exams_id[]" value="{{ $hash->decodeHex(Request::segment(5)) }}">
                                                        <input type="hidden" name="type[]" value="Multiple Choice">
                                                        <div class="col-lg-12">
                                                            <textarea class="form-control" name="question[]" rows="3" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <div class="input-group mt-3">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        A
                                                                    </div>
                                                                </div>
                                                                <input type="text" class="form-control" name="cho1[]" aria-label="Text input with radio button" placeholder="Option 1" required>
                                                            </div>
                                                            <div class="input-group mt-1">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text ">
                                                                        B
                                                                    </div>
                                                                </div>
                                                                <input type="text" class="form-control" name="cho2[]" aria-label="Text input with radio button" placeholder="Option 2" required>
                                                            </div>
                                                            <div class="input-group mt-1">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        C
                                                                    </div>
                                                                </div>
                                                                <input type="text" class="form-control" name="cho3[]" aria-label="Text input with radio button" placeholder="Option 3" required>
                                                            </div>
                                                            <div class="input-group mt-1">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        D
                                                                    </div>
                                                                </div>
                                                                <input type="text" class="form-control" name="cho4[]" aria-label="Text input with radio button" placeholder="Option 4" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="AnswerKey">Answer</label>
                                                            <select class="form-select form-control" style="width: 100px;" name="answer[]" aria-label="Default select example" required>
                                                                <option value="A">A</option>
                                                                <option value="B">B</option>
                                                                <option value="C">C</option>
                                                                <option value="B">D</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-2 text-right">
                                                   <button type="button" class="btn btn-danger btn-sm mr-3 remove_question" id="remove" style="width: 100px;">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card mt-3" id="stickyChunk">
                                            <div class="card-body border">
                                                <div class="form-group">
                                                    <select id="type" class="form-control">
                                                        <option value="MC">Multiple Choice</option>
                                                        <option value="ToF">True or False</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-primary btn-sm btn-block" id="add_question">Add Question</button>
                                                    <button type="submit" class="btn btn-success btn-sm btn-block">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            var rowcount, addBtn, cardbody;

            addBtn = $('#add_question');
            rowcount = $('.rowcount').length+1;
            cardbody = $('#show-question');

            function formHtml(){

                var option = $('#type').val();

                mc = '<div class="card border rowcount mt-3" id="card'+rowcount+'">';
                    mc += '<div class="card-body">';
                        mc += '<div class="form-group row add-question">';
                            mc += '<input type="hidden" name="exams_id[]" id="exams_id'+rowcount+'" value="{{ $hash->decodeHex(Request::segment(5)) }}">';
                            mc += '<input type="hidden" name="type[]" id="type'+rowcount+'" value="Multiple Choice">';
                            mc += '<div class="col-lg-12">';
                                mc += '<textarea class="form-control" name="question[]" id="question'+rowcount+'" rows="3" required></textarea>';
                            mc += '</div>';
                        mc += '</div>';
                        mc += '<div class="form-group mc Opt">';
                            mc += '<div class="form-group">';
                                mc += '<div class="input-group mt-3">';
                                    mc += '<div class="input-group-prepend">';
                                        mc += '<div class="input-group-text">';
                                            mc += 'A';
                                        mc += '</div>';
                                    mc += '</div>';
                                    mc += '<input type="text" class="form-control" name="cho1[]" id="cho1'+rowcount+'" placeholder="Option 1" required>';
                                mc += '</div>';
                                mc += '<div class="input-group mt-1">';
                                    mc += '<div class="input-group-prepend">';
                                        mc += '<div class="input-group-text ">';
                                            mc += 'B';
                                        mc += '</div>';
                                    mc += '</div>';
                                    mc += '<input type="text" class="form-control" name="cho2[]" id="cho2'+rowcount+'" placeholder="Option 2" required>';
                                mc += '</div>';
                                mc += '<div class="input-group mt-1">';
                                    mc += '<div class="input-group-prepend">';
                                        mc += '<div class="input-group-text">';
                                            mc += 'C';
                                        mc += '</div>';
                                    mc += '</div>';
                                    mc += '<input type="text" class="form-control" name="cho3[]" id="cho3'+rowcount+'" placeholder="Option 3" required>';
                                mc += '</div>';
                                mc += '<div class="input-group mt-1">';
                                    mc += '<div class="input-group-prepend">';
                                        mc += '<div class="input-group-text">';
                                            mc += 'D';
                                        mc += '</div>';
                                    mc += '</div>';
                                    mc += '<input type="text" class="form-control" name="cho4[]" id="cho4'+rowcount+'" placeholder="Option 4" required>';
                                mc += '</div>';
                            mc += '</div>';
                            mc += '<div class="form-group">';
                                mc += '<label for="AnswerKey">Answer</label>';
                                mc += '<select class="form-select form-control" style="width: 100px;" name="answer[]" id="answer'+rowcount+'" required>';
                                    mc += '<option value="A">A</option>';
                                    mc += '<option value="B">B</option>';
                                    mc += '<option value="C">C</option>';
                                    mc += '<option value="B">D</option>';
                                mc += '</select>';
                            mc += '</div>';
                        mc += '</div>';
                    mc += '</div>';
                    mc += '<div class="mb-2 text-right">';
                        mc += '<button type="button" class="btn btn-danger btn-sm mr-3 remove_question" id="remove'+rowcount+'" style="width: 100px">Remove</button>';
                    mc += '</div>';
                mc += '</div>';

                tof = '<div class="card border rowcount mt-3" id="card'+rowcount+'">';
                    tof += '<div class="card-body">';
                        tof += '<div class="form-group row add-question">';
                            tof += '<div class="col-lg-12">';
                                tof += '<input type="hidden" name="exams_id[]" id="exams_id'+rowcount+'" value="{{ $hash->decodeHex(Request::segment(5)) }}">';
                                tof += '<input type="hidden" name="type[]" id="type'+rowcount+'" value="True or False">';
                                tof += '<textarea class="form-control" name="question[]" id="question'+rowcount+'" rows="3" required></textarea>';
                            tof += '</div>';
                        tof += '</div>';
                        tof += '<div class="form-group mc Opt">';
                            tof += '<div class="form-group">';
                                tof += '<div class="form-check">';
                                    tof += '<label class="form-radio-label">';
                                        tof += '<input class="form-radio-input" type="radio" disabled>';
                                        tof += '<input type="hidden" name="cho1[]" id="cho1'+rowcount+'" value="True">';
                                        tof += '<span class="form-radio-sign">  True</span>';
                                    tof += '</label>';
                                    tof += '<br />';
                                    tof += '<label class="form-radio-label">';
                                        tof += '<input class="form-radio-input" type="radio" name="cho2[]" id="cho2'+rowcount+'" disabled>';
                                        tof += '<input type="hidden" name="cho2[]" id="cho2'+rowcount+'" value="False">';
                                        tof += '<span class="form-radio-sign">  False</span>';
                                    tof += '</label>';
                                    tof += '<input type="hidden" name="cho3[]" id="cho3'+rowcount+'">';
                                    tof += '<input type="hidden" name="cho4[]" id="cho4'+rowcount+'">';
                                tof += '</div>';
                            tof += '</div>';
                            tof += '<div class="form-group">';
                                tof += '<label for="AnswerKey">Answer</label>';
                                tof += '<select class="form-select form-control" style="width: 100px;" name="answer[]" id="answer'+rowcount+'" required>';
                                    tof += '<option value="True">True</option>';
                                    tof += '<option value="False">False</option>';
                                tof += '</select>';
                            tof += '</div>';
                        tof += '</div>';
                    tof += '</div>';
                    tof += '<div class="mb-2 text-right">';
                        tof += '<button type="button" class="btn btn-danger btn-sm mr-3 remove_question" id="remove'+rowcount+'" style="width: 100px">Remove</button>';
                    tof += '</div>';
                tof += '</div>';

                rowcount++;

                if (option == 'MC') {
                    return mc;
                } else {
                    return tof;
                }
            }

            function addNewRow(){
                var html = formHtml();
                cardbody.append(html);
            }

            function deleteRow(){

                let delete_question = $(this).parent().parent();
                $(delete_question).remove();
            }

            function ChangeOpt(){
                $(this).find("option:selected")
                       .each(function () {
                    var optionValue = $(this).attr("value");
                    if (optionValue) {
                        $(".Opt").not("." + optionValue).hide();
                        $("." + optionValue).show();
                    } else {
                        $(".Opt").hide();
                    }
                });
            }

            function registerEvents(){
                addBtn.on("click", addNewRow);
                $(document).on('click', '.remove_question', deleteRow);
                $(document).on('change', '.choOpt', ChangeOpt);
            }
            registerEvents();

            var stickyNavTop = $('#stickyChunk').offset().top;

            var stickyNav = function(){
                var scrollTop = $(window).scrollTop();

                if (scrollTop > stickyNavTop)
                    {
                        $('#stickyChunk').addClass('sticky');
                    }
                else
                    {
                        $('#stickyChunk').removeClass('sticky');
                    }
            };

            stickyNav();

            $(window).scroll(function() {
                stickyNav();
            });

        });
    </script>
@endsection
