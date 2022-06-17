@extends('welcome')

@section('content')
    <h1 class="mb-1">Welcome</h1>
    <h2 class="mb-5"><em>to QuizzyQuick Application</em></h2>
    <h3 class="mb-6">Please Choice Portal to redirect the main page</h3>
    @if (Route::has('teacher.login'))
        <a class="btn btn-xl button" href="{{ route('teacher.login') }}"><img src="{{ asset('assets/img/logo2.png') }}" alt="" width="200"><h4>Teacher</h4></a>
    @endif
    @if (Route::has('student.login'))
        <a class="btn btn-xl button" href="{{ route('student.login') }}"><img src="{{ asset('assets/img/logo1.png') }}" alt="" width="200"><h4>Student</h4></a>
    @endif
@endsection
