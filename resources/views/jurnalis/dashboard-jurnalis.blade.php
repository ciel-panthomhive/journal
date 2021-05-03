<div class="card-body">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Artikel</th>
                <th>Tanggal Submit</th>
                <th>Status</th>
                <th>Keterangan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($artikel as $a)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($a->artikelstatus[0]->id_status == 3 || $a->artikelstatus[0]->id_status == 4)
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
                    <td>{{ $a->Keterangan }}</td>
                    <td>
                        @if ($a->artikelstatus[0]->id_status == 3 || $a->artikelstatus[0]->id_status == 4)
                            <a href="{{ route('artikelredaktur.edit', ['id' => $a->id, 'id_artikel' => $a->artikelstatus[0]->id_artikel]) }}"
                                class="btn btn-warning">Edit</a>
                        @else
                            <a href="#" class="btn btn-secondary">Edit</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
