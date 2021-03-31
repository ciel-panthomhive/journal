@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('home') }}" style="float:left" class="btn btn-primary">Back</a>
        <br />
        <div class="card mt-5">
            @include('layouts.alert')
            <div class="card-body" style="margin:20px">

                <form method="post" action="{{ route('verifikasi.publish', ['id' => $artikel->id]) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <br />
                    <h5 style="text-align:center; background:deeppink; width:150px; color:white">
                        {{ $artikel->artikelsubkategori[0]->subkategori->subkategories }}</h5>
                    <h1 style="text-align:center">{{ $artikel->judul }}</h1>
                    <h6 style="text-align:center">{{ $artikel->user->name }},
                        {{ $artikel->artikelstatus[0]->updated_at }}
                    </h6>
                    <br />
                    <img src="{{ asset('uploads/' . $artikel->thumb) }}" style="width:650px; margin-left:200px" />
                    <br />
                    <br />
                    <td>{!! $artikel->isi !!}</td>
            </div>

        </div>
        <br />
        @role('redaktur')
        <button type="submit" class="btn btn-success" style="float:right">Publish</button>

        <a href="{{ route('tolak', ['id' => $artikel->id]) }}" style="float:left" class="btn btn-danger">Tolak</a>
        <a href="{{ route('verifikasi.edit', ['id' => $artikel->id]) }}" style="margin-left: 500px;"
            class="btn btn-warning">Edit</a>
        @endrole
    </div>
@endsection
