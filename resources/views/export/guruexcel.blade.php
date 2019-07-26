<table>
    <thead>
    <tr>
        <th>Nama</th>
        <th>Telepon</th>
        <th>Alamat</th>
        <th>Mata Pelajaran</th>
    </tr>
    </thead>
    <tbody>
    @foreach($guru as $g)
        <tr>
            <td>{{ $g->nama }}</td>
            <td>{{ $g->telepon}}</td>
            <td>{{$g->alamat}}</td>
            @foreach($mapel as $mp)
                @if($mp->id == $g->mapel_id)
                    <td>{{$mp->nama}}</td>
                @endif
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>