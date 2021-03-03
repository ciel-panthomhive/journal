@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            @include('layouts.alert')
            <div class="card-header text-center">
                Kategori
            </div>
            <div class="card-body">
                <a href="{{ route('subkategori.add') }}" class="btn btn-primary">New Kategori</a>
                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Rubik</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subkategori as $s)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @isset($s->kategori)
                                        {{ $s->kategori->kategories }}
                                    @endisset
                                </td>
                                <td>{{ $s->subkategories }}</td>
                                {{-- <td>{{ $s->id }}</td>
                                <td>{{ $s-> }}</td>
                                <td>{{ $s->subkategories }}</td> --}}
                                <td>
                                    <a href="{{ route('subkategori.edit', ['id' => $s->id]) }}"
                                        class="btn btn-warning">Edit</a>
                                    <a href="{{ route('subkategori.delete', ['id' => $s->id]) }}"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
