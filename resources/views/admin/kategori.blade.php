@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            @include('layouts.alert')
            <div class="card-header text-center">
                Rubik
            </div>
            <div class="card-body">
                <a href="{{ route('kategori.add') }}" class="btn btn-primary">New Rubik</a>
                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Rubik</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $k)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $k->kategories }}</td>
                                <td>
                                    <a href="{{ route('kategori.edit', ['id' => $k->id]) }}"
                                        class="btn btn-warning">Edit</a>
                                    <a href="{{ route('kategori.delete', ['id' => $k->id]) }}"
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
