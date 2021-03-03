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
            <div class="card-header text-center">
                Edit Kategori
            </div>
            <div class="card-body">
                <a href="{{ route('subkategori') }}" class="btn btn-primary">Back</a>
                <br />
                <br />

                <form method="post" action="{{ route('subkategori.update', ['id' => $subkategori->id]) }}">

                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label>Rubik</label>
                        <select class="form-control select2-single" name="id_kategori">
                            @forelse ($kategori as $k)
                                <option value="{{ $k->id }}"
                                    {{ $k->kategories == $subkategori->id_kategori ? 'selected' : '' }}>
                                    {{ $k->kategories }}
                                </option>
                                <option value="null"> </option>
                            @empty
                                <option value=""> </option>
                            @endforelse
                        </select>

                    </div>

                    <div class="form-group">
                        <label>Subkategori</label>
                        <input type="text" name="subkategories" class="form-control"
                            value="{{ $subkategori->subkategories }}">

                        @if ($errors->has('subkategories'))
                            <div class="text-danger">
                                {{ $errors->first('subkategories') }}
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
