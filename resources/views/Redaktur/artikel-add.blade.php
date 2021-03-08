@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            {{-- <div class="card-header text-center">
                Add Artikel
            </div> --}}
            <div class="card-body">
                <a href="{{ route('myartikel') }}" class="btn btn-primary">Back</a>
                <br />
                <br />

                <form method="post" action="{{ route('kategori.new') }}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Tanggal Penulisan</label>
                        <input type="text" name="kategories" class="form-control" placeholder="Rubik">

                        @if ($errors->has('kategories'))
                            <div class="text-danger">
                                {{ $errors->first('kategories') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="kategories" class="form-control" placeholder="Rubik">

                        @if ($errors->has('kategories'))
                            <div class="text-danger">
                                {{ $errors->first('kategories') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" name="kategories" class="form-control" placeholder="Rubik">

                        @if ($errors->has('kategories'))
                            <div class="text-danger">
                                {{ $errors->first('kategories') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Thumbnail</label>
                        <input type="text" name="kategories" class="form-control" placeholder="Rubik">

                        @if ($errors->has('kategories'))
                            <div class="text-danger">
                                {{ $errors->first('kategories') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Isi</label>
                        <input type="text" name="isi" class="form-control" placeholder="Isi">

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
