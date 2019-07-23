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
				<h1 class="panel-title">Edit Data Guru</h1>
			</div>
			<div class="panel-body">
						<form action="/guru/{{$guru->id}}/update" method="POST" enctype="multipart/form-data">
						        	{{csrf_field()}}
						        	<div class="form-group {{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
									    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
									    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
									    	@foreach(dataMapel() as $mp)
									    		<option value="{{$mp->id}}" @if($guru->mapel_id==$mp->id) selected @endif>{{$mp->nama}}</option>
									    	@endforeach
									    </select>
									    @if($errors->has('jenis_kelamin'))
									    	<span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
									    @endif
									</div>

								  <div class="form-group {{$errors->has('nama') ? 'has-error' : ''}}">
								    <label for="exampleInputEmail1">Nama</label>
								    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nama_depan" placeholder="Nama Lengkap" name="nama" value="{{$guru->nama}}">
								    @if($errors->has('nama'))
								    	<span class="help-block">{{$errors->first('nama')}}</span>
								    @endif
								  </div>

								  <div class="form-group {{$errors->has('telepon') ? 'has-error' : ''}}">
								    <label for="exampleInputEmail1">No Telepon</label>
								    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nama_depan" placeholder="No telepon" name="telepon" value="{{$guru->telepon}}">
								    @if($errors->has('telepon'))
								    	<span class="help-block">{{$errors->first('telepon')}}</span>
								    @endif
								  </div>

								  <div class="form-group {{$errors->has('alamat') ? 'has-error' : ''}}">
								    <label for="alamat">Alamat</label>
								    <textarea class="form-control" id="alamat" rows="3" name="alamat">{{$guru->alamat}}</textarea>
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
