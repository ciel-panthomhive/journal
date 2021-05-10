@extends('layouts.wishlist')
@section('content')
    {{-- {{ dd($artie) }} --}}
    {{-- @dd($youtube) --}}

    <div class="container-fluid">
        <div id="carouselId" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                <li data-target="#carouselId" data-slide-to="1"></li>
                <li data-target="#carouselId" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                {{-- {{ dd($artikelstatus) }} --}}
                @foreach ($art as $a)
                    {{-- <a href="{{ route('artikel-wishlist', $a->artikel->id) }}" --}}
                    {{-- style="text-decoration: none; color: black"> --}}
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="d-flex">
                            <img class="" src="{{ asset('uploads/' . $a->thumb) }}"
                                style="height: 25rem; width: 60%; object-fit: cover" alt="First slide">
                            <div class="card bg-purple" style="width: 40%">
                                <div class="card-body">
                                    <a href="{{ route('artikel-wishlist', $a->id) }}"
                                        style="text-decoration: none; color: black">
                                        <h4>{{ $a->judul }}</h4>
                                        <p>{!! substr(strip_tags($a->isi), 0, 50) !!}..</p>
                                    </a>
                                </div>
                            </div>
                            {{-- </a> --}}
                        </div>
                    </div>
                @endforeach

                {{-- <div class="carousel-item">
                <img class="card-img-top" src="{{ asset('uploads/' . $a->artikel->thumb) }}" style="height: 25rem"
                    alt="Second slide">
            </div>

            <div class="carousel-item">
                <img class="card-img-top" src="{{ asset('uploads/' . $a->artikel->thumb) }}" style="height: 25rem"
                    alt="Third slide">
            </div> --}}


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
            @foreach ($artikel as $artk)
                <div class="col-md-3 col-sm-6 col-12 mb-2">
                    <a href="{{ route('artikel-wishlist', $artk->id) }}" style="text-decoration: none; color: black">
                        <div class="card">
                            {{-- <img class="card-img-top" src="https://picsum.photos/250" alt=""> --}}
                            <img class="card-img-top" src="{{ asset('uploads/' . $artk->thumb) }}"
                                style="height: 10rem; object-fit: cover" alt="{{ $artk->thumb }}">
                            <div class="card-body">
                                <small
                                    class="badge rounded-pill px-4 py-2 mb-3 bg-pink text-white">{{ $artk->artikelsubkategori[0]->subkategori->subkategories }}</small>
                                <h5 class="card-title">{{ $artk->judul }}</h5>
                                <p>{!! substr(strip_tags($artk->isi), 0, 50) !!}..</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row mt-3 justify-content-center">
            <a href="#"><img class="clickable" src="{{ asset('assets/icons/prev-pink.png') }}" width="50" /></a>
            <a href="#"><img class="clickable" src="{{ asset('assets/icons/next-pink.png') }}" width="50" /></a>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-3 col-12 m-auto">
                <div class="polygon-test mb-3 mx-auto bg-green d-flex align-items-center justify-content-center"
                    style="max-width: 10rem; height: 6rem;">
                    <h1 class="title-text">Video.</h1>
                </div>
            </div>
            <div class="col-md-9 col-12 text-center">
                <div class="row">
                    @for ($index = 0; $index < $youtube->count(); $index++)
                        <div class="col-md-4 col-12">
                            <iframe class="w-100" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                type="text/html"
                                src="https://www.youtube.com/embed/{{ $youtube[$index]->id->videoId }}"></iframe>
                            <p>{{ $youtube[$index]->snippet->title }}</p>
                        </div>
                        @if ($index == count($youtube) / 2 - 1)
                </div>
                <div class="row">
                    @endif
                    @endfor
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
            @foreach ($users as $jrnls)
                <div class="col-md col-sm-6 col-12">
                    <img style="border: 1px solid #000000; width: 150px; height: 150px; overflow: hidden; border-radius: 50%; object-fit: cover; display: block; margin-right: auto; margin-left: auto;"
                        src="{{ $jrnls->foto != '' ? asset('uploads/' . $jrnls->foto) : asset('assets/images/cowok-removebg-preview.png') }}">
                    <p style="text-align:center" class="mb-0">Nama : {{ $jrnls->name }}</p>
                    {{-- <p>Age : 00</p> --}}
                </div>
            @endforeach
        </div>
        <!-- </div> -->
    </div>
@endsection
