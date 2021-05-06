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
                Add Kategori
            </div>
            <div class="card-body">
                <a href="{{ route('subkategori') }}" class="btn btn-primary">Back</a>
                <br />
                <br />

                <form method="post" action="{{ route('subkategori.new') }}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Rubik</label>
                        <select class="form-control select2-single" name="id_kategori">
                            <option value="">-</option>
                            @forelse ($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->kategories }} </option>
                            @empty
                                <option value="">-</option>
                            @endforelse
                        </select>

                    </div>

                    <div class="form-group">
                        <label>Subkategori</label>
                        <input type="text" name="subkategories" class="form-control" placeholder="Kategori">

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
