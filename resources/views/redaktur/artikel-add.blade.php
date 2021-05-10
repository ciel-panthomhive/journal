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
                <br />
                <br />

                <form method="post" action="{{ route('redaktur.draft') }}" enctype="multipart/form-data">

                    {{ csrf_field() }}

                    <div class="row">

                        {{-- <div class="col">
                            <label>Tanggal Penulisan</label>
                            <input type="date" name="tanggal" class="form-control" placeholder="Tanggal">

                            @if ($errors->has('tanggal'))
                                <div class="text-danger">
                                    {{ $errors->first('tanggal') }}
                                </div>
                            @endif
                        </div> --}}

                        @role('redaktur')
                        <div class="col">
                            <label>Jenis</label>
                            <select class="form-control select2-single" name="id_headline">
                                @forelse ($headline as $h)
                                    <option value="{{ $h->id }}">{{ $h->highlight }} </option>
                                @empty
                                    <option value=""> </option>
                                @endforelse
                            </select>
                        </div>
                        @endrole

                        <div class="col">
                            <label>Kategori</label>
                            <select class="form-control select2-single" name="id_subkategori">
                                @forelse ($subkategori as $k)
                                    <option value="{{ $k->id }}">{{ $k->subkategories }} </option>
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
                            <input type="text" name="judul" class="form-control" placeholder="Judul">

                            @if ($errors->has('judul'))
                                <div class="text-danger">
                                    {{ $errors->first('judul') }}
                                </div>
                            @endif
                        </div>

                        <div class="col">
                            <label>Thumbnail</label><br>
                            <input type="file" name="thumb">


                            @if ($errors->has('thumb'))
                                <div class="text-danger">
                                    {{ $errors->first('thumb') }}
                                </div>
                            @endif
                        </div>
                    </div>
            </div>

            <div class="col">
                <label>Isi</label>
                <textarea id="isi" name="isi" class="" placeholder="Isi"></textarea>

                @if ($errors->has('isi'))
                    <div class="text-danger">
                        {{ $errors->first('isi') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                @role('redaktur')
                <button type="submit" style="" class="btn btn-warning">Draft</button>
                <button formaction="{{ route('artikelredaktur.new') }}" type="submit" style="float:Right"
                    class="btn btn-success">Kirim</button>
                @endrole
                @role('jurnalis')
                <button formaction="{{ route('artikeljurnalis.newDraft') }}" type="submit" style=""
                    class="btn btn-warning">Draft</button>
                <button formaction="{{ route('artikeljurnalis.new') }}" type="submit" style="float:Right"
                    class="btn btn-success">Kirim</button>
                @endrole
            </div>

            </form>

        </div>
    </div>
    </div>
@endsection
