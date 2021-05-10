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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($artikelstatus as $a)
                            {{-- @dd($a) --}}
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td> @isset($a->artikel)
                                        {{ $a->artikel->judul }}
                                    @endisset
                                </td>
                                <td>@isset($a->artikel)
                                        {{ $a->artikel->updated_at }}
                                    @endisset</td>
                                </td>
                                <td>{{ $a->updated_at }}</td>

                                <td>
                                    @isset($a->artikel)
                                        {{ $a->artikel->user->name }}
                                    @endisset
                                </td>
                                <td>@isset($a->artikel)
                                        {{ $a->artikel->keterangan }}
                                    @endisset</td>
                                <td>
                                    <a href="{{ route('artikelredaktur.edit', ['id' => $a->id]) }}"
                                        class="btn btn-warning">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
