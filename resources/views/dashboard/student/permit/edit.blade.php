@extends('layout.student')

@section('title')
    Edit Permit
@endsection

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Edit Permit</h4>
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
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Permit</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Update Permit</h4>
                            <a href="/student/permit" class="btn btn-primary btn-round ml-auto">
                                Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('student/permit/update-permits/'.$permits->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col"></div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label>Semester</label>
                                        <select name="semester" class="form-select form-control" value="{{ $permits->semester }}">
                                            <option selected hidden>{{ $permits->semester }}</option>
                                            <option value="1st Semester">1st Semester</option>
                                            <option value="2nd Semester">2nd Semester</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Term</label>
                                        <select name="term" class="form-select form-control">
                                            <option selected hidden>{{ $permits->term }}</option>
                                            <option value="Prelim">Prelim</option>
                                            <option value="Midterm">Midterm</option>
                                            <option value="Semi-Finals">Semi-Finals</option>
                                            <option value="Finals">Finals</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Course</label>
                                        <select name="course" class="form-select form-control">
                                            <option selected hidden>{{ $permits->course }}</option>
                                            <option value="ACT">ACT</option>
                                            <option value="BSIT">BSIT</option>
                                            <option value="BSBA">BSBA</option>
                                            <option value="BSED">BSED</option>
                                            <option value="BEED">BEED</option>
                                            <option value="BSHRM">BSHRM</option>
                                            <option value="BSTM">BSTM</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>S.Y</label>
                                        <input type="text" name="sy" class="form-control sy" placeholder="Enter S.Y" value="{{ $permits->sy }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Permit</label>
                                        <input type="file" name="permit" class="form-control mb-3">
                                        <img src="{{ asset('uploads/students/'.$permits->permit) }}" width="110px" height="90px" alt="Image">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary form-control btn-sm">Update</button>
                                    </div>
                                </div>
                                <div class="col"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
