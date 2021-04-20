@extends('layouts.wishlist')
@section('content')
    {{-- {{ dd($artie) }} --}}
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
                            {{-- <p class="card-text">Text</p> --}}
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
