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
                            <th>Jenis</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($artikelheadline as $a)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @isset($a->artikel)
                                        {{ $a->artikel->judul }}
                                    @endisset
                                </td>
                                <td>
                                    @isset($a->artikel)
                                        {{ $a->artikel->update_at }}
                                    @endisset
                                </td>
                                <td>
                                    @isset($a->artikel)
                                        {{ $a->artikel->publish->created_at }}
                                    @endisset
                                </td>
                                <td> @isset($a->headline)
                                        {{ $a->headline->jenis }}
                                    @endisset</td>
                                <td>
                                    <a href="{{ route('headline-edit', ['id' => $a->id]) }}"
                                        class="btn btn-danger">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
