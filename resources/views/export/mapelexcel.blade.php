<table>
    <thead>
    <tr>
        <th>Kode</th>
        <th>Nama</th>
        <th>Semester</th>
        <th>Pengajar</th>
    </tr>
    </thead>
    <tbody>
    @foreach($mapel as $mp)
        <tr>
            <td>{{ $mp->kode }}</td>
            <td>{{ $mp->nama}}</td>
            <td>{{$mp->semester}}</td>
            @foreach($guru as $g)
                @if($mp->id == $g->mapel_id)
                    <td>{{$g->nama}}</td>
                @endif
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>