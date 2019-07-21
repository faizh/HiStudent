@extends('layout.master')

@section('content')
<div class="main">
			<div class="main-content">
				<div class="container-fluid">
@if(session('sukses'))
		<div class="alert alert-success" role="alert">
		  {{session('sukses')}}
		</div>
		@endif

	<div class="col-md-12">
		<!-- TABLE HOVER -->
		<div class="panel">
			<div class="panel-heading">
				<h1 class="panel-title">Edit Data Siswa</h1>
			</div>
			<div class="panel-body">
						<form action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data">
						        	{{csrf_field()}}
								  <div class="form-group">
								    <label for="exampleInputEmail1">Nama Depan</label>
								    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nama_depan" placeholder="Nama Depan" name="nama_depan" value="{{$siswa->nama_depan}}">
								  </div>

								  <div class="form-group">
								    <label for="exampleInputEmail1">Nama Belakang</label>
								    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nama_belakang" placeholder="Nama Belakang" name="nama_belakang" value="{{$siswa->nama_belakang}}">
								  </div>

								  <div class="form-group">
								    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
								    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
								      <option value="L" @if($siswa->jenis_kelamin=='L') selected @endif>Laki-laki</option>
								      <option value="P" @if($siswa->jenis_kelamin=='P') selected @endif>Perempuan</option>
								    </select>
								  </div>

								  <div class="form-group">
								    <label for="exampleFormControlSelect1">Agama</label>
								    <select class="form-control" id="agama" name="agama">
								      <option value="Islam" @if($siswa->agama=='Islam') selected @endif>Islam</option>
								      <option value="Kristen" @if($siswa->agama=='Kristen') selected @endif>Kristen</option>
								      <option value="Katolik" @if($siswa->agama=='Katolik') selected @endif>Katolik</option>
								      <option value="Buddha"  @if($siswa->agama=='Buddha') selected @endif>Buddha</option>
								      <option value="Konghucu" @if($siswa->agama=='Konghucu') selected @endif>Konghucu</option>
								    </select>
								  </div>

								  <div class="form-group">
								    <label for="alamat">Alamat</label>
								    <textarea class="form-control" id="alamat" rows="3" name="alamat">{{$siswa->alamat}}</textarea>
								  </div>

								  <div class="form-group">
								    <label for="alamat">Avatar</label>
								    <input type="file" name="avatar" class="form-control">
								  </div>

								  <button type="submit" class="btn btn-primary btn-warning">Update</button>
								</form>
						
					</div>
				</div>
			</div>
			</div>
		</div>
		<!-- END TABLE HOVER -->
	</div>

			</div>
		</div>
@stop


@section('content1')
<div class="main">
			<div class="main-content">
				<div class="container-fluid">
		@if(session('sukses'))
		<div class="alert alert-success" role="alert">
		  {{session('sukses')}}
		</div>
		@endif
		<div class="row">
		<div class="col-12 pt-2">
			<h1>Data Siswa</h1>
			<form action="/siswa/{{$siswa->id}}/update" method="POST">
			        	{{csrf_field()}}
					  <div class="form-group">
					    <label for="exampleInputEmail1">Nama Depan</label>
					    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nama_depan" placeholder="Nama Depan" name="nama_depan" value="{{$siswa->nama_depan}}">
					  </div>

					  <div class="form-group">
					    <label for="exampleInputEmail1">Nama Belakang</label>
					    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nama_belakang" placeholder="Nama Belakang" name="nama_belakang" value="{{$siswa->nama_belakang}}">
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
					    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
					      <option value="L" @if($siswa->jenis_kelamin=='L') selected @endif>Laki-laki</option>
					      <option value="P" @if($siswa->jenis_kelamin=='P') selected @endif>Perempuan</option>
					    </select>
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlSelect1">Agama</label>
					    <select class="form-control" id="agama" name="agama">
					      <option value="Islam" @if($siswa->agama=='Islam') selected @endif>Islam</option>
					      <option value="Kristen" @if($siswa->agama=='Kristen') selected @endif>Kristen</option>
					      <option value="Katolik" @if($siswa->agama=='Katolik') selected @endif>Katolik</option>
					      <option value="Buddha"  @if($siswa->agama=='Buddha') selected @endif>Buddha</option>
					      <option value="Konghucu" @if($siswa->agama=='Konghucu') selected @endif>Konghucu</option>
					    </select>
					  </div>

					  <div class="form-group">
					    <label for="alamat">Alamat</label>
					    <textarea class="form-control" id="alamat" rows="3" name="alamat">{{$siswa->alamat}}</textarea>
					  </div>
					  <button type="submit" class="btn btn-primary btn-warning">Update</button>
					</form>
			</div>
		</div>
		</div>
	</div>
</div>

@endsection