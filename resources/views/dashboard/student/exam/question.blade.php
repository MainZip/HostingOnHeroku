@extends('layout.student')

@section('title')
    {{ $exams->title }}
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
                    <a href="#">Join Exam</a>
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
                            <h4 class="card-title">Answer Question</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('student.submit_question') }}" method="post">
                            @csrf
                            <input type="hidden" name="teacher_id" value="{{ $exams->teacher_id }}">
                            <input type="hidden" name="exams_id" value="{{ $exams->id }}">
                            {{-- <input type="hidden" name="student_id" value="{{ Auth::user()->id }}"> --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-control">
                                        <div class="row mt-3">
                                            <div class="col">
                                                <h5>Date : {{ $exams->date }}</h5>
                                            </div>
                                            <div class="col text-center">
                                                <h5>Timer <span class="js-timeout" id="total-time-left">{{ $exams->duration }}:00</span></h5>
                                            </div>
                                            <div class="col text-right">
                                                <h5>Status : Running</h5>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach ($questions as $key => $question)

                                        @if ($question->type == 'Multiple Choice')
                                            <div class="form-control mt-3">
                                                <label class="mb-4 font-weight-bold">{{ $key+1 }}. {{ $question->question }}</label>
                                                @php
                                                    $options=json_decode(json_encode(json_decode($question['options'])),true);
                                                @endphp
                                                <input type="hidden" name="question{{ $key+1 }}" value="{{ $question->id }}">
                                                <div class="form-radio-label ml-4">
                                                    <input class="form-check-input" type="radio" value="A" name="choices{{ $key+1 }}"/>
                                                    <label class="form-check-label"> {{ $options['cho1'] }} </label>
                                                </div>
                                                <div class="form-radio-label ml-4">
                                                    <input class="form-check-input" type="radio" value="B" name="choices{{ $key+1 }}"/>
                                                    <label class="form-check-label"> {{ $options['cho2'] }} </label>
                                                </div>
                                                <div class="form-radio-label ml-4">
                                                    <input class="form-check-input" type="radio" value="C" name="choices{{ $key+1 }}"/>
                                                    <label class="form-check-label"> {{ $options['cho3'] }} </label>
                                                </div>
                                                <div class="form-radio-label ml-4">
                                                    <input class="form-check-input" type="radio" value="D" name="choices{{ $key+1 }}">
                                                    <label class="form-check-label"> {{ $options['cho4'] }} </label>
                                                </div>
                                                <div class="form-radio-label ml-4" style="display: none;">
                                                    <input class="form-check-input" type="radio" name="choices{{ $key+1 }}" checked="checked"/>
                                                    <label class="form-check-label" for="flexRadioDefault1"> {{ $options['cho4'] }} </label>
                                                </div>
                                            </div>
                                        @else
                                            <div class="form-control mt-3">
                                                <label class="mb-4 font-weight-bold">{{ $key+1 }}. {{ $question->question }}</label>
                                                @php
                                                    $options=json_decode(json_encode(json_decode($question['options'])),true);
                                                @endphp
                                                <input type="hidden" name="question{{ $key+1 }}" value="{{ $question->id }}">
                                                <div class="form-radio-label ml-4">
                                                    <input class="form-check-input" type="radio" value="True" name="choices{{ $key+1 }}"/>
                                                    <label class="form-check-label"> {{ $options['cho1'] }} </label>
                                                </div>
                                                <div class="form-radio-label ml-4">
                                                    <input class="form-check-input" type="radio" value="False" name="choices{{ $key+1 }}"/>
                                                    <label class="form-check-label"> {{ $options['cho2'] }} </label>
                                                </div>
                                                <div class="form-radio-label ml-4" style="display: none;">
                                                    <input class="form-check-input" type="radio" name="choices{{ $key+1 }}" checked="checked"/>
                                                    <label class="form-check-label" for="flexRadioDefault1"> {{ $options['cho2'] }} </label>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    <div class="float-right mt-3">
                                        <input type="hidden" name="index" value="{{ $key+1 }}">
                                        <button type="submit" class="btn btn-info" id="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var interval;
        function countdown() {
            clearInterval(interval);
            interval = setInterval( function() {
                var timer = $('.js-timeout').html();
                timer = timer.split(':');
                var minutes = timer[0];
                var seconds = timer[1];
                seconds -= 1;
                if (minutes < 0) return;
                else if (seconds < 0 && minutes != 0) {
                    minutes -= 1;
                    seconds = 59;
                }
                else if (seconds < 10 && length.seconds != 2) seconds = '0' + seconds;

                $('.js-timeout').html(minutes + ':' + seconds);

                if (minutes == 0 && seconds == 0) {
                    clearInterval(interval);
                    $.post("{{ route('student.submit_question') }}", $("form").serialize());
                    window.location.href = "{{ url('/student/result') }}";
                }
            }, 1000);
        }

        // $('.js-timeout').text("02:00");
        countdown();
    </script>
@endsection
