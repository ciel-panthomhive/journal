@extends('layouts.wishlist')
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col">
                <h3 class="text-center">{{ $artikel->judul }}</h3>
                <p class="text-center mb-0" style="font-size: 0.8rem">{{ $artikel->artikelstatus[0]->updated_at }}</p>
                <p class="text-center" style="font-size: 0.8rem">By {{ $artikel->user->name }}</p>
                <img style="width:650px; height:400px ; margin-left:230px; object-fit: cover" class="text-center mb-3"
                    style="max-width: 100%" src="{{ asset('uploads/' . $artikel->thumb) }}" />
                {!! $artikel->isi !!}
            </div>
        </div>
    </div>
@endsection
