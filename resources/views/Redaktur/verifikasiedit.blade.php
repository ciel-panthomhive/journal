@extends('layouts.app')

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2-single').select2({
                theme: 'bootstrap4',
            });
        });

    </script>
@endpush

@section('content')
    <div class="container">
        <div class="card mt-5">
            {{-- <div class="card-header text-center">
                Add Artikel
            </div> --}}
            <div class="card-body">
                <a href="{{ route('read', ['id' => $artikel->id]) }}" class="btn btn-primary">Back</a>
                <div class="form-group" style="float:Right">
                    <h4>{{ $artikel->user->name }}</h4>
                    <td>{{ $artikel->user->updated_at }}</td>
                </div>
                <br />
                <br />

                <form method="post" action="{{ route('verifikasi.update', ['id' => $artikel->id]) }}"
                    enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="row">

                        <div class="col">
                            <label>Kategori</label>
                            <select class="form-control select2-single" name="id_subkategori">
                                @forelse($subkategori as $s)
                                    <option value="{{ $s->id }}"
                                        {{ $s->id == $artikelsubkategori->id_subkategori ? 'selected' : '' }}>
                                        {{ $s->subkategories }}</option>
                                @empty
                                    <option value=""> </option>
                                @endforelse
                            </select>

                        </div>


                        @if ($errors->has('id_subkategories'))
                            <div class="text-danger">
                                {{ $errors->first('id_subkategories') }}
                            </div>
                        @endif
                    </div>

                    <div class="row">


                        <div class="col">
                            <label>Judul</label>
                            <input type="text" name="judul" class="form-control" value="{{ $artikel->judul }}">

                            @if ($errors->has('judul'))
                                <div class="text-danger">
                                    {{ $errors->first('judul') }}
                                </div>
                            @endif
                        </div>

                        <div class="col">
                            <label>Thumbnail</label><br>
                            <input type="file" name="thumb" value="{{ $artikel->thumb }}">

                            <img src="{{ asset('uploads/' . $artikel->thumb) }}" style="width: 100px" />
                        </div>
                    </div>
            </div>

            <div class="col">
                <label>Isi</label>
                <textarea id="isi" name="isi" class="">{{ $artikel->isi }}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Kirim</button>
            </div>

            </form>

        </div>
    </div>
    </div>
@endsection
