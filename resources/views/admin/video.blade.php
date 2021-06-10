@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            @include('layouts.alert')
            <div class="card-header text-center">
                Video
            </div>
            <div class="card-body">
                <a href="{{ route('fetch-youtube') }}" class="btn btn-primary">Fetch Data from Youtube API</a>
                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Thumbnail</th>
                            <th style="width: 12%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($video as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <b>{!! $item->nama !!}</b><br>
                                    {!! $item->description !!}
                                </td>
                                <td><img src="{{ $item->thumbnail }}" style="height: 10rem" /></td>
                                <td>
                                    <a href="{{ $item->url }}"
                                        class="btn btn-primary" target="_blank">Go to Link</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $video->links("pagination::bootstrap-4") }}
            </div>
        </div>
    </div>
@endsection
