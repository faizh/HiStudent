<table border="1">
	<tr>
		<th>Nama</th>
		<th>Jenis Kelamin</th>
		<th>Agama</th>
		<th>Rata Rata Nilai</th>
	</tr>
	@foreach($siswa as $s)
	<tr>
		<td>{{$s->namaLengkap()}}</td>
		<td>{{$s->jenis_kelamin}}</td>
		<td>{{$s->agama}}</td>
		<td>{{$s->rataRataNilai()}}</td>
	</tr>
	@endforeach
</table>