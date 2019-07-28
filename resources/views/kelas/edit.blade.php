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
						<form action="/kelas/{{$kelas->id}}/update" method="POST" enctype="multipart/form-data">
						        	{{csrf_field()}}


								  <div class="form-group {{$errors->has('nama') ? 'has-error' : ''}}">
								    <label for="exampleInputEmail1">Nama Kelas</label>
								    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nama_depan" placeholder="Kelas" name="nama" value="{{$kelas->nama}}">
								    @if($errors->has('nama_depan'))
								    	<span class="help-block">{{$errors->first('nama')}}</span>
								    @endif
								  </div>

								  <div class="form-group {{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
									    <label for="exampleFormControlSelect1">Wali Kelas</label>
									    <select class="form-control" id="jenis_kelamin" name="mapel_id">
									    	@foreach(dataMapel() as $mp)
									    		<option value="{{$mp->id}}" @if($guru->mapel_id==$mp->id) selected @endif>{{$mp->nama}}</option>
									    	@endforeach
									    </select>
									    @if($errors->has('jenis_kelamin'))
									    	<span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
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
