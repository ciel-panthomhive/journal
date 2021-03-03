@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Add Rubik
            </div>
            <div class="card-body">
                <a href="{{ route('kategori') }}" class="btn btn-primary">Back</a>
                <br />
                <br />

                <form method="post" action="{{ route('kategori.new') }}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Rubik</label>
                        <input type="text" name="kategories" class="form-control" placeholder="Rubik">

                        @if ($errors->has('kategories'))
                            <div class="text-danger">
                                {{ $errors->first('kategories') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Simpan">
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
