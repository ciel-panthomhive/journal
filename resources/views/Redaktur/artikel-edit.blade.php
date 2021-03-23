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
                <a href="{{ route('myartikel') }}" class="btn btn-primary">Back</a>
                @role('redaktur')
                <div class="form-group" style="float:Right">
                    <h4>{{ $artikel->user->name }}</h4>
                    <td>{{ $artikel->user->updated_at }}</td>
                </div>
                @endrole
                <br />
                <br />

                <form method="post" action="{{ route('redakturdraft.update', ['id' => $artikel->id]) }}"
                    enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="row">



                        <div class="col">
                            <label>Kategori</label>
                            <select class="form-control select2-single" name="id_subkategori">
                                @forelse ($subkategori as $k)
                                    <option value="{{ $k->id }}">
                                        {{ $k->id_kategori == $artikel->id_subkategori ? 'selected' : '' }}
                                        {{ $k->subkategories }}</option>
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

                            @if ($errors->has('thumb'))
                                <div class="text-danger">
                                    {{ $errors->first('thumb') }}
                                </div>
                            @endif
                            <img src="{{ asset('uploads/' . $artikel->thumb) }}" style="width: 100px" />
                        </div>
                    </div>
            </div>

            <div class="col">
                <label>Isi</label>
                <textarea id="isi" name="isi" class="">{{ $artikel->isi }}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" style="" class="btn btn-warning">Draft</button>
                <button type="submit" formaction="{{ route('artikelredaktur.update', ['id' => $artikel->id]) }}"
                    name="kirim" style="float:Right" class="btn btn-success">Kirim</button>
            </div>

            </form>

        </div>
    </div>
    </div>
@endsection
