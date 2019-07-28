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
								  <div class="form-group {{$errors->has('nama_depan') ? 'has-error' : ''}}">
								    <label for="exampleInputEmail1">Nama Depan</label>
								    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nama_depan" placeholder="Nama Depan" name="nama_depan" value="{{$siswa->nama_depan}}">
								    @if($errors->has('nama_depan'))
								    	<span class="help-block">{{$errors->first('nama_depan')}}</span>
								    @endif
								  </div>

								  <div class="form-group {{$errors->has('nama_belakang') ? 'has-error' : ''}}">
								    <label for="exampleInputEmail1">Nama Belakang</label>
								    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nama_belakang" placeholder="Nama Belakang" name="nama_belakang" value="{{$siswa->nama_belakang}}">
								    @if($errors->has('nama_belakang'))
								    	<span class="help-block">{{$errors->first('nama_belakang')}}</span>
								    @endif
								  </div>

								  <div class="form-group {{$errors->has('nama_depan') ? 'has-error' : ''}}">
								    <label for="exampleInputEmail1">Kelas</label>
								    <select class="form-control" id="kelas_id" name="kelas_id">
								    	@foreach($kelas as $k)
								    		<option value="{{$k->id}}" @if($k->id==$siswa->kelas_id) selected @endif>{{$k->nama}}</option>	
								    	@endforeach
								    </select>
								    @if($errors->has('nama_depan'))
								    	<span class="help-block">{{$errors->first('nama_depan')}}</span>
								    @endif
								  </div>

								  <div class="form-group {{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
								    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
								    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
								      <option value="L" @if($siswa->jenis_kelamin=='L') selected @endif>Laki-laki</option>
								      <option value="P" @if($siswa->jenis_kelamin=='P') selected @endif>Perempuan</option>
								    </select>
								    @if($errors->has('jenis_kelamin'))
								    	<span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
								    @endif
								  </div>

								  <div class="form-group {{$errors->has('agama') ? 'has-error' : ''}}">
								    <label for="exampleFormControlSelect1">Agama</label>
								    <select class="form-control" id="agama" name="agama">
								      <option value="Islam" @if($siswa->agama=='Islam') selected @endif>Islam</option>
								      <option value="Kristen" @if($siswa->agama=='Kristen') selected @endif>Kristen</option>
								      <option value="Katolik" @if($siswa->agama=='Katolik') selected @endif>Katolik</option>
								      <option value="Buddha"  @if($siswa->agama=='Buddha') selected @endif>Buddha</option>
								      <option value="Konghucu" @if($siswa->agama=='Konghucu') selected @endif>Konghucu</option>
								    </select>
								    @if($errors->has('agama'))
								    	<span class="help-block">{{$errors->first('agama')}}</span>
								    @endif
								  </div>

								  <div class="form-group {{$errors->has('alamat') ? 'has-error' : ''}}">
								    <label for="alamat">Alamat</label>
								    <textarea class="form-control" id="alamat" rows="3" name="alamat">{{$siswa->alamat}}</textarea>
								    @if($errors->has('alamat'))
								    	<span class="help-block">{{$errors->first('alamat')}}</span>
								    @endif
								  </div>

								  <div class="form-group {{$errors->has('avatar') ? 'has-error' : ''}}">
								    <label for="alamat">Avatar</label>
								    <input type="file" name="avatar" class="form-control">
								    @if($errors->has('avatar'))
								    	<span class="help-block">{{$errors->first('avatar')}}</span>
								    @endif
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