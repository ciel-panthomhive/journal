@extends('layouts.wishlist')
@section('content')
    <div class="container-fluid">
        <div id="carouselId" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                <li data-target="#carouselId" data-slide-to="1"></li>
                <li data-target="#carouselId" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="d-flex">

                        <img src="https://picsum.photos/966/400" alt="First slide">
                        <div class="card w-100 bg-purple">
                            <div class="card-body">
                                <h4>Title</h4>
                                <p>Description</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/1366/400" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/1366/400" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
                <img src="{{ asset('assets/icons/prev-green.png') }}" width="50" />
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                <img src="{{ asset('assets/icons/next-green.png') }}" width="50" />
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="container my-5">
        <div class="polygon-test mb-3 mx-auto bg-green d-flex align-items-center justify-content-center"
            style="max-width: 18rem; height: 5rem;">
            <h1 class="title-text">Latest News.</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-12">
                <div class="card">
                    <img class="card-img-top" src="https://picsum.photos/250" alt="">
                    <div class="card-body">
                        <small class="badge rounded-pill px-4 py-2 mb-3 bg-pink text-white">Lifestyle</small>
                        <h5 class="card-title">Title</h5>
                        <p class="card-text">Text</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="card">
                    <img class="card-img-top" src="https://picsum.photos/250" alt="">
                    <div class="card-body">
                        <small class="badge rounded-pill px-4 py-2 mb-3 bg-pink text-white">Lifestyle</small>
                        <h5 class="card-title">Title</h5>
                        <p class="card-text">Text</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="card">
                    <img class="card-img-top" src="https://picsum.photos/250" alt="">
                    <div class="card-body">
                        <small class="badge rounded-pill px-4 py-2 mb-3 bg-pink text-white">Lifestyle</small>
                        <h5 class="card-title">Title</h5>
                        <p class="card-text">Text</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="card">
                    <img class="card-img-top" src="https://picsum.photos/250" alt="">
                    <div class="card-body">
                        <small class="badge rounded-pill px-4 py-2 mb-3 bg-pink text-white">Lifestyle</small>
                        <h5 class="card-title">Title</h5>
                        <p class="card-text">Text</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 justify-content-center">
            <a href="#"><img class="clickable" src="{{ asset('assets/icons/prev-pink.png') }}" width="50" /></a>
            <a href="#"><img class="clickable" src="{{ asset('assets/icons/next-pink.png') }}" width="50" /></a>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-3 col-12 m-auto">
                <div class="polygon-test mb-3 mx-auto bg-green d-flex align-items-center justify-content-center"
                    style="max-width: 10rem; height: 6rem;">
                    <h1 class="title-text">Video.</h1>
                </div>
            </div>
            <div class="col-lg-9 col-12 text-center">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <iframe class="w-100" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                            type="text/html" src="https://www.youtube.com/embed/4RiI-JZkeLQ"></iframe>
                        <p>Text</p>
                    </div>
                    <div class="col-lg-4 col-12">
                        <iframe class="w-100" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                            type="text/html" src="https://www.youtube.com/embed/QFcFEpFmNJ8"></iframe>
                        <p>Text</p>
                    </div>
                    <div class="col-lg-4 col-12">
                        <iframe class="w-100" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                            type="text/html" src="https://www.youtube.com/embed/D-nFd38nbfo"></iframe>
                        <p>Text</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <iframe class="w-100" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                            type="text/html" src="https://www.youtube.com/embed/OFmBAtIxWjc"></iframe>
                        <p>Text</p>
                    </div>
                    <div class="col-lg-4 col-12">
                        <iframe class="w-100" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                            type="text/html" src="https://www.youtube.com/embed/Cm0mv2qQBes"></iframe>
                        <p>Text</p>
                    </div>
                    <div class="col-lg-4 col-12">
                        <iframe class="w-100" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                            type="text/html" src="https://www.youtube.com/embed/DBXH9jJRaDk"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 justify-content-center">
            <a href="#"><img src="{{ asset('assets/icons/prev-yellow.png') }}" width="50" /></a>
            <a href="#"><img src="{{ asset('assets/icons/next-yellow.png') }}" width="50" /></a>
        </div>
    </div>
    <div class="container my-5">
        <div class="polygon-test mb-3 mx-auto bg-green d-flex align-items-center justify-content-center"
            style="max-width: 12rem; height: 7rem;">
            <h2 class="title-text">Wishlist<br>Friend.</h2>
        </div>
        <!-- <div class="row mx-4 my-4 border border-success"> -->
        <div class="row mx-4 my-4">
            <div class="col-lg col-12">
                <img class="w-100" src="{{ asset('assets/images/cowok-removebg-preview.png') }}">
                <p class="mb-0">Name : Lorem Ipsum</p>
                <p>Age : 00</p>
            </div>
            <div class="col-lg col-12">
                <img class="w-100" src="{{ asset('assets/images/cewek-removebg-preview.png') }}">
                <p class="mb-0">Name : Lorem Ipsum</p>
                <p>Age : 00</p>
            </div>
            <div class="col-lg col-12">
                <img class="w-100" src="{{ asset('assets/images/cowok-removebg-preview.png') }}">
                <p class="mb-0">Name : Lorem Ipsum</p>
                <p>Age : 00</p>
            </div>
            <div class="col-lg col-12">
                <img class="w-100" src="{{ asset('assets/images/cewek-removebg-preview.png') }}">
                <p class="mb-0">Name : Lorem Ipsum</p>
                <p>Age : 00</p>
            </div>
            <div class="col-lg col-12">
                <img class="w-100" src="{{ asset('assets/images/cowok-removebg-preview.png') }}">
                <p class="mb-0">Name : Lorem Ipsum</p>
                <p>Age : 00</p>
            </div>
        </div>
        <!-- </div> -->
    </div>
@endsection
