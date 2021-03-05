@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            @include('layouts.alert')
            <div class="card-header text-center">
                Publish
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Artikel</th>
                            <th>Tanggal Submit</th>
                            <th>Tanggal Publish</th>
                            <th>Penulis</th>
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
                                <td>
                                    @isset($a->users)
                                        {{ $a->users->name }}
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
