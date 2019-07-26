<table class="table1" style="
                            border: 1px solid #999;
                            padding: 8px 20px;
                            text-align: left;
                        ">
    <thead style="background-color: #f5f5f5;">
    <tr style="border: 1px solid #000">
        <th>Kode</th>
        <th>Nama</th>
        <th>Semester</th>
        <th>Pengajar</th>
    </tr>
    </thead>
    <tbody  style="background-color: #f5f5f5;">
    
    @foreach($mapel as $mp)
        <tr>
            <td>{{ $mp->kode }}</td>
            <td>{{ $mp->nama}}</td>
            <td>{{$mp->semester}}</td>
            <td>
            @php
            $no=1;
            @endphp
            @foreach($guru as $g)
                @if($mp->id == $g->mapel_id)
                    <table>
                        <tr>
                            <td>{{$no++}}. {{$g->nama}}</td>
                        </tr>
                    </table>
                @endif
            @endforeach
            </td>   
        </tr>
    @endforeach
    </tbody>
</table>