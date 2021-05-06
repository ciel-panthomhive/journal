@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Redaktur') }}</div>

                <div class="card-body">
                    {{-- <a href="{{ route('user') }}" class="btn btn-primary">Back</a> --}}
                    <br />
                    <br />

                    <form method="post" action="{{ route('user.new') }}" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jk"
                                class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>

                            <div class="col-md-6">
                                <input id="jk" type="text" class="form-control @error('jk') is-invalid @enderror" name="jk"
                                    value="{{ old('jk') }}" required autocomplete="jk">

                                @error('jk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror"
                                    name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat">

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ktp" class="col-md-4 col-form-label text-md-right">{{ __('KTP') }}</label>

                            <div class="col-md-6">
                                <input id="ktp" type="file" class="@error('ktp') is-invalid @enderror" name="ktp"
                                    value="{{ old('ktp') }}" required autocomplete="ktp">

                                @error('ktp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Add') }}
                                </button>

                                <a href="{{ route('user') }}" class="btn btn-danger" style="float:right">Back</a>
                            </div>
                        </div>


                        {{-- <div class="form-group">
                        <input type="hidden" name="password" class="form-control">
                    </div> --}}

                        {{-- <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Simpan">
                    </div> --}}

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
