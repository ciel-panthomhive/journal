@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            @include('layouts.alert')
            <div class="card-header text-center">
                My Artikel
            </div>
            <div class="card-body">
                <a href="{{ route('user.add') }}" class="btn btn-primary">Add Artikel</a>
                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Artikel</th>
                            <th>Tanggal Submit</th>
                            <th>Tanggal Publish</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($artikel as $a)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $a->judul }}</td>
                                <td>{{ $a->updated_at }}</td>
                                <td>
                                    @isset($a->publish)
                                        {{ $a->publish->created_at }}
                                    @endisset
                                </td>
                                <td>{{ $a->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
