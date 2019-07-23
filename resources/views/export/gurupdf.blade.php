<table border="1">
	<tr>
		<th>Nama</th>
		<th>Telepon</th>
		<th>Alamat</th>
		<th>Mata Pelajaran</th>
	</tr>
	@foreach($guru as $g)
	<tr>
		<td>{{$g->nama}}</td>
		<td>{{$g->telepon}}</td>
		<td>{{$g->alamat}}</td>
		<?php
		foreach ($mapel as $mp) {
		if($g->mapel_id==$mp->id){
		?>
		<td>{{$mp->nama}}</td>
		<?php
		}
		}
		?>
	</tr>
	@endforeach
</table>