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
                Alasan Ditolak
            </div>
            <div class="card-body">

                <a href="{{ route('read', ['id' => $artikel->id]) }}" class="btn btn-primary">Back</a>
                <br />
                <br />

                <form method="post" action="{{ route('alasan', ['id' => $artikel->id]) }}">

                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="row">

                        <div class="">
                            <textarea id="keterangan" placeholder="Alasan ditolak...." style="width:1097px; height:200px"
                                name="keterangan" class="form-control"></textarea>

                            @if ($errors->has('isi'))
                                <div class="text-danger">
                                    {{ $errors->first('isi') }}
                                </div>
                            @endif
                        </div>
                    </div>
            </div>

            <div class="form-group">
                <button type="submit" style="" class="btn btn-success">Kirim</button>
            </div>

            </form>

        </div>
    </div>
    </div>
@endsection
