<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Artikel</th>
            <th>Tanggal Submit</th>
            <th>Penulis</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($artikelstatus as $a)
            {{-- @dd($a) --}}
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td> @isset($a->artikel)
                        <a href="{{ route('read', ['id' => $a->id]) }}" style="color: #000">{{ $a->artikel->judul }}</a>
                    @endisset
                </td>
                <td>@isset($a->artikel)
                        {{ $a->artikel->updated_at }}
                    @endisset</td>
                </td>
                <td>
                    @isset($a->artikel)
                        {{ $a->artikel->user->name }}
                    @endisset
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
