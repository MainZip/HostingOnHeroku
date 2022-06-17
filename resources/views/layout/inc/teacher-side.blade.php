<!-- Sidebar -->
<div class="sidebar sidebar-style-2" data-background-color="dark2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    @if(Auth::user()->avatar)
                        <img src="{{ asset('/storage/images/'.Auth::user()->avatar) }}" alt="..." class="avatar-img rounded-circle">
                    @endif
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}
                            <span class="user-level">Teacher</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{ 'teacher/dashboard' == request()->path() ? 'active' : '' }}">
                    <a href="{{ route('teacher.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                <li class="nav-item {{ 'teacher/subject' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('teacher/subject') }}">
                        <i class="fas fa-book-open"></i>
                        <p>Subject</p>
                    </a>
                </li>
                <li class="nav-item {{ 'teacher/exam' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('teacher/exam') }}">
                        <i class="fas fa-pen-square"></i>
                        <p>Exam</p>
                    </a>
                </li>
                <li class="nav-item {{ 'teacher/responses' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('teacher/responses') }}">
                        <i class="fas fa-bell"></i>
                        <p>Responses</p>
                    </a>
                </li>
                <li class="nav-item {{ 'teacher/profile' == request()->path() ? 'active' : '' }}">
                    <a href="{{ url('teacher/profile') }}">
                        <i class="fas fa-user"></i>
                        <p>Profile</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
