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
                        {{-- @dd($artikelheadline) --}}

                        @role('redaktur')
                        <div class="col">
                            <label>Jenis</label>
                            <select class="form-control select2-single" name="id_headline">
                                @forelse($headline as $h)
                                    <option value="{{ $h->id }}"
                                        {{ $h->id == $artikelheadline->id_headline ? 'selected' : '' }}>
                                        {{ $h->highlight }}</option>
                                @empty
                                    <option value=""> </option>
                                @endforelse
                            </select>
                        </div>
                        @endrole

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

                        {{-- @dd($artikelsubkategori) --}}
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
                @role('redaktur')
                <button type="submit" style="" class="btn btn-warning">Draft</button>
                <button type="submit" formaction="{{ route('artikelredaktur.update', ['id' => $artikel->id]) }}"
                    name="kirim" style="float:Right" class="btn btn-success">Kirim</button>
                @endrole
                @role('jurnalis')
                <button formaction="{{ route('artikeljurnalis.upDraft', ['id' => $artikel->id]) }}" type="submit"
                    style="" class="btn btn-warning">Draft</button>
                <button formaction="{{ route('artikeljurnalis.update', ['id' => $artikel->id]) }}" type="submit"
                    style="float:Right" class="btn btn-success">Kirim</button>
                @endrole
            </div>

            </form>

        </div>
    </div>
    </div>
@endsection
