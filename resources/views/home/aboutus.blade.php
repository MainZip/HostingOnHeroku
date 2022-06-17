@extends('welcome')

@section('link')
    <style>
        .card .img2 img{
        position: relative;
        display: block;
        margin-left: auto;
        margin-right: auto;
        z-index: 1;
        width: 140px;
        height: 140px;
        border-radius: 50%;
        border: 7px solid #fff;
        }

        .card:hover .img2 img {
            border-color: darkcyan;
            transition: .7s;
        }
    </style>
@endsection

@section('content')
    <!-- Callout-->
    <section class="callout">
        <div class="container px-4 px-lg-5 text-center">
            <h2 class="mx-auto mb-5">
                About Us
            </h2>
            <br/>
            <br/>
            <br/>
            <br/>
            <p class="text-justify">
                    Our online examination Application provides innovative and impeccable solutions for exams throughout various colleges, universities, educational institutions, and many leading corporate entities. Conduct Exam is developed by a highly qualified team and specialized in creating high impact online exam software which is highly efficient in terms of reliability and speed.
            </p>
            <p>With our online examination Application, anyone can conduct online exams or tests easily, and a team of innovators constantly research on making the procedure of exam simple & easy. Conduct Exam aims to help the students and the clients, such as companies and universities, to transcend the time constraints and geographical boundaries with a highly skilled administrator and monitor. Complete and precise information on the exam is available on the portal.</p>

        </div>
    </section>
@endsection

@section('section')
    <!-- Portfolio-->
    <section class="content-section" id="portfolio">
        <div class="container px-4 px-lg-5">
            <div class="content-section-heading text-center">
                <h2 class="mb-0">Our Team</h2>
                <h3 class="text-secondary mb-5">NCC</h3>
            </div>
            <div class="row gx-0">
                <div class="col-md-12 col-xl-4 p-3">
                    <div class="card img2" style="border-radius: 15px;">
                        <div class="card-body text-center">
                            <div class="mt-3 mb-4 img2">
                                <img src="{{ asset('assets/img/reyan.jpg') }}"
                                class="rounded-circle img-fluid" style="width: 150px; height:150px;" />
                            </div>
                            <h4 class="mb-2">Reyan Albeos</h4>
                            <p class="text-muted mb-4">@Researcher</p>
                            <div class="mb-4 pb-2">
                                <a href="https://web.facebook.com/profile.php?id=100011430558496" class="btn btn-outline-primary btn-floating">
                                    <i class="fab fa-facebook-f fa-lg"></i>
                                </a>
                                <button type="button" class="btn btn-outline-primary btn-floating">
                                    <i class="fab fa-twitter fa-lg"></i>
                                </button>
                                <button type="button" class="btn btn-outline-primary btn-floating">
                                    <i class="fab fa-google fa-lg"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-4 p-3">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body text-center">
                            <div class="mt-3 mb-4 img2">
                                <img src="{{ asset('assets/img/lloyd.jpeg') }}"
                                class="rounded-circle img-fluid" style="width: 150px; height:150px;" />
                            </div>
                            <h4 class="mb-2">John Lloyd Batican</h4>
                            <p class="text-muted mb-4">@Researcher</p>
                            <div class="mb-4 pb-2">
                                <a href="https://web.facebook.com/profile.php?id=100076704185598" class="btn btn-outline-primary btn-floating">
                                    <i class="fab fa-facebook-f fa-lg"></i>
                                </a>
                                <button type="button" class="btn btn-outline-primary btn-floating">
                                    <i class="fab fa-twitter fa-lg"></i>
                                </button>
                                <button type="button" class="btn btn-outline-primary btn-floating">
                                    <i class="fab fa-google fa-lg"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-4 p-3">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body text-center">
                            <div class="mt-3 mb-4 img2">
                                <img src="{{ asset('assets/img/charm.jpg') }}"
                                class="rounded-circle img-fluid" style="width: 150px; height:150px;" />
                            </div>
                            <h4 class="mb-2">Charmain Ann Ignacio</h4>
                            <p class="text-muted mb-4">@Researcher</p>
                            <div class="mb-4 pb-2">
                                <a href="https://www.facebook.com/charmaineann.ignacio.1" class="btn btn-outline-primary btn-floating">
                                    <i class="fab fa-facebook-f fa-lg"></i>
                                </a>
                                <button type="button" class="btn btn-outline-primary btn-floating">
                                    <i class="fab fa-twitter fa-lg"></i>
                                </button>
                                <button type="button" class="btn btn-outline-primary btn-floating">
                                    <i class="fab fa-google fa-lg"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-4 p-3">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body text-center">
                            <div class="mt-3 mb-4 img2">
                                <img src="{{ asset('assets/img/inggo.jpeg') }}"
                                class="rounded-circle img-fluid" style="width: 150px; height:150px;" />
                            </div>
                            <h4 class="mb-2">Rech Mael Matugas</h4>
                            <p class="text-muted mb-4">@Researcher</p>
                            <div class="mb-4 pb-2">
                                <a href="https://web.facebook.com/hcerleam.matugas" class="btn btn-outline-primary btn-floating">
                                    <i class="fab fa-facebook-f fa-lg"></i>
                                </a>
                                <button type="button" class="btn btn-outline-primary btn-floating">
                                    <i class="fab fa-twitter fa-lg"></i>
                                </button>
                                <button type="button" class="btn btn-outline-primary btn-floating">
                                    <i class="fab fa-google fa-lg"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-4 p-3 mb-3">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body text-center">
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <h4 class="mb-4">Quizzy-Quick</h4>
                            <p class="text-muted mb-4">Online Examination Application</p>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-4 p-3">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body text-center">
                            <div class="mt-3 mb-4 img2">
                                <img src="{{ asset('assets/img/jomar.jpg') }}"
                                class="rounded-circle img-fluid" style="width: 150px; height:150px;" />
                            </div>
                            <h4 class="mb-2">Jomar Zanoria</h4>
                            <p class="text-muted mb-4">@Researcher</p>
                            <div class="mb-4 pb-2">
                                <a href="https://www.facebook.com/jomarzanoria05?_rdc=1&_rdr" class="btn btn-outline-primary btn-floating">
                                    <i class="fab fa-facebook-f fa-lg"></i>
                                </a>
                                <button type="button" class="btn btn-outline-primary btn-floating">
                                    <i class="fab fa-twitter fa-lg"></i>
                                </button>
                                <button type="button" class="btn btn-outline-primary btn-floating">
                                    <i class="fab fa-google fa-lg"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
