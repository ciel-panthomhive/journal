@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            @include('layouts.alert')
            <div class="card-header text-center">
                My Artikel
            </div>
            <div class="card-body">
                <a href="{{ route('artikelredaktur.add') }}" class="btn btn-primary">Add Artikel</a>
                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Artikel</th>
                            <th>Tanggal Submit</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($artikel as $a)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($a->artikelstatus[0]->id_status == 3)
                                        <a href="{{ route('artikelredaktur.edit', ['id' => $a->id, 'id_artikel' => $a->artikelstatus[0]->id_artikel]) }}"
                                            style="color: #000;">{{ $a->judul }}</a>
                                    @else
                                        {{ $a->judul }}
                                    @endif
                                </td>
                                <td>{{ $a->updated_at }}</td>
                                <td>
                                    @isset($a->artikelstatus[0])
                                        {{ $a->artikelstatus[0]->status->statuses }}
                                    @endisset
                                </td>
                                <td>
                                    {{ $a->keterangan }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
