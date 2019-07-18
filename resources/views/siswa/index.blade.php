@extends('layout.master')

@section('content')
		@if(session('sukses'))
		<div class="alert alert-success" role="alert">
		  {{session('sukses')}}
		</div>
		@endif
		<div class="row">

		<div class="col-6">
			<h1>Data Siswa</h1>
		</div>
		<div class="col-6 pt-2">
			<button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal">
			  Tambah Data
			</button>
		</div>
		<table class="table table-hover">
			<tr>
				<th>Nama Depan</th>
				<th>Nama Belakang</th>
				<th>Jenis Kelamin</th>
				<th>Agama</th>
				<th>Alamat</th>
				<th>Aksi</th>
			</tr>

			@foreach($data_siswa as $a)
			<tr>
				<td>{{$a->nama_depan}}</td>
				<td>{{$a->nama_belakang}}</td>
				<td>{{$a->jenis_kelamin}}</td>
				<td>{{$a->agama}}</td>
				<td>{{$a->alamat}}</td>
				<td><a href="/siswa/{{$a->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
					<a href="/siswa/{{$a->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Dihapus?')">Delete</a></td>
			</tr>
			@endforeach
		</table>

		</div>
	</div>


<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Masukan Data Siswa</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>

			      <div class="modal-body">
			        <form action="/siswa/create" method="POST">
			        	{{csrf_field()}}
					  <div class="form-group">
					    <label for="exampleInputEmail1">Nama Depan</label>
					    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nama_depan" placeholder="Nama Depan" name="nama_depan">
					  </div>

					  <div class="form-group">
					    <label for="exampleInputEmail1">Nama Belakang</label>
					    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nama_belakang" placeholder="Nama Belakang" name="nama_belakang">
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
					    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
					      <option value="L">Laki-laki</option>
					      <option value="P">Perempuan</option>
					    </select>
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Agama</label>
					    <select class="form-control" id="agama" name="agama">
					      <option value="Islam">Islam</option>
					      <option value="Kristen">Kristen</option>
					      <option value="Katolik">Katolik</option>
					      <option value="Buddha">Buddha</option>
					      <option value="Konghucu">Konghucu</option>
					    </select>
					  </div>

					  <div class="form-group">
					    <label for="alamat">Alamat</label>
					    <textarea class="form-control" id="alamat" rows="3" name="alamat"></textarea>
					  </div>

			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Submit</button>
					</form>
			      </div>
			    </div>
			  </div>
			
@endsection