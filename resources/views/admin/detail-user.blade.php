@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            @include('layouts.alert')
            <div class="card-header text-center">
                KTP
            </div>
            <div class="card-body" style="margin:20px">

                <form method="post" action="#">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    {{-- <img src="{{ asset('uploads/' . $us->foto) }}"
                        style="border: 1px solid #000000; width: 150px; height: 150px; overflow: hidden; border-radius: 50%; object-fit: cover; margin-left:265px;" />
                    <br />
                    <br />
                    <h5 style="margin-left:30px"> Nama : {{ $us->name }}</h5>
                    <h5 style="margin-left:30px">Email : {{ $us->email }}</h5>
                    <h5 style="margin-left:30px">Jenis Kelamin : {{ $us->jk }}</h5>
                    <h5 style="margin-left:30px">Alamat : {{ $us->alamat }}</h5> --}}
                    <br />
                    <img src="{{ asset('uploads/' . $us->ktp) }}" style="height:500px;" />
                    <br />
                    <br />
            </div>

        </div>
        <br />
        {{-- <button type="submit" class="btn btn-success" style="float:right">Publish</button> --}}

        <a href="{{ route('user') }}" style="float:left" class="btn btn-primary">Back</a>
    </div>
@endsection
