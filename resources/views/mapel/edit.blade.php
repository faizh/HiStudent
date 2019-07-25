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
				<h1 class="panel-title">Edit Data mapel</h1>
			</div>
			<div class="panel-body">
						<form action="/mapel/{{$mapel->id}}/update" method="POST" enctype="multipart/form-data">
						        	{{csrf_field()}}
								  <div class="form-group {{$errors->has('nama') ? 'has-error' : ''}}">
								    <label for="exampleInputEmail1">Nama Mata Pelajaran</label>
								    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nama_depan" placeholder="Nama Mata Pelajaran" name="nama" value="{{$mapel->nama}}" required="required">
								    @if($errors->has('nama'))
								    	<span class="help-block">{{$errors->first('nama')}}</span>
								    @endif
								  </div>

								  <div class="form-group {{$errors->has('kode') ? 'has-error' : ''}}">
								    <label for="exampleInputEmail1">Kode Mata Pelajaran</label>
								    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nama_depan" placeholder="Kode Mata Pelajaran" name="kode" value="{{$mapel->kode}}" required="required">
								    @if($errors->has('kode'))
								    	<span class="help-block">{{$errors->first('kode')}}</span>
								    @endif
								  </div>

								  <div class="form-group {{$errors->has('semester') ? 'has-error' : ''}}">
								    <label for="exampleInputEmail1">Semester</label>
								    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nama_depan" placeholder="Semester" name="semester" value="{{$mapel->semester}}">
								    @if($errors->has('semester'))
								    	<span class="help-block">{{$errors->first('semester')}}</span>
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