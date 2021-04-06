@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="text-align:center">{{ __('My Profil') }}</div>
                    <div class="card-body">
                        <br />

                        <form method="post" action="{{ route('profil.update', ['id' => $users->id]) }}"
                            enctype="multipart/form-data">

                            {{ csrf_field() }}
                            {{ method_field('PUT') }}


                            <div class="col">
                                <img src="{{ asset('uploads/' . $users->foto) }}"
                                    style="border: 1px solid #000000; width: 150px; height: 150px; overflow: hidden; border-radius: 50%; object-fit: cover; margin-left:265px;" />
                                <br />
                                <br />
                                <input type="file" style="margin-left:245px" name="foto">

                            </div>

                            <br />
                            <br />
                            <div class="col">
                                <label>Nama</label>
                                <input type="text" name="name" class=" form-control" value="{{ $users->name }}">

                                @if ($errors->has('name'))
                                    <div class="text-danger">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>


                            <div class="col">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" value="{{ $users->email }}">
                            </div>

                            <br />
                            <br />
                            <div class="col">
                                <a href="{{ route('change', ['id' => $users->id]) }}" style="float:left"
                                    class="btn btn-danger">Ubah Password</a>
                                <button type="submit" style="float:right" class="btn btn-success">Simpan</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection