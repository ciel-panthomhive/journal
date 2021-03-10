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

                    <div class="row">

                        <div class="col">
                            <label>Tanggal Penulisan</label>
                            <input type="text" name="kategories" class="form-control" placeholder="Rubik">

                            @if ($errors->has('kategories'))
                                <div class="text-danger">
                                    {{ $errors->first('kategories') }}
                                </div>
                            @endif
                        </div>

                        <div class="col">
                            <label>Kategori</label>
                            <input type="text" name="kategories" class="form-control" placeholder="Rubik">

                            @if ($errors->has('kategories'))
                                <div class="text-danger">
                                    {{ $errors->first('kategories') }}
                                </div>
                            @endif
                        </div>

                        <div class="w-100"></div>

                        <div class="col">
                            <label>Judul</label>
                            <input type="text" name="kategories" class="form-control" placeholder="Rubik">

                            @if ($errors->has('kategories'))
                                <div class="text-danger">
                                    {{ $errors->first('kategories') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Thumbnail</label><br>
                            <input type="file" name="kategories">


                            @if ($errors->has('kategories'))
                                <div class="text-danger">
                                    {{ $errors->first('kategories') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Isi</label>
                        <textarea id="isi" name="isi" class="form-control" placeholder="Isi"></textarea>

                        @if ($errors->has('kategories'))
                            <div class="text-danger">
                                {{ $errors->first('kategories') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Simpan">
                        <input style="float:Right" type="submit" class="btn btn-success" value="Kirim">
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
