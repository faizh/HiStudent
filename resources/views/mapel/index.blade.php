@extends('layout.master')

@section('content')
<div class="main">
			<div class="main-content">
				<div class="container-fluid">

<div class="col-md-12">
							<!-- TABLE HOVER -->
							<div class="panel">
								<div class="panel-heading">
									<h1 class="panel-title">Data mapel</h1>
									<!-- <div class="right">
											<a href="/mapel/exportexcel" class="btn btn-success btn-sm">Export Excel</a>
											<a href="/mapel/exportpdf" class="btn btn-success btn-sm">Export PDF</a>
									</div> -->
								</div>
								<div class="panel-body">
									<button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal">
									  Tambah Data
									</button>

									<table class="table table-hover">
										<thead>
											<tr>
												<th>Kode</th>
												<th>Mata Pelajaran</th>
												<th>Semester</th>
												<th>Pengajar</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
										@foreach($data_mapel as $mapel)
											<tr>
												<td>{{$mapel->kode}}</td>
												<td>{{$mapel->nama}}</td>
												<td>{{$mapel->semester}}</td>
												<td>
													<table>
														@php
														$no=1;
														@endphp
														@foreach($data_guru as $guru)
														@if($mapel->id==$guru->mapel_id)
														<tr>
															<td>{{$no++}}. {{$guru->nama}}</td>
														</tr>
														@endif
														@endforeach
													</table>
												</td>
												<td><a href="/mapel/{{$mapel->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
												<a href="#" class="btn btn-danger btn-sm delete" mapel-id="{{$mapel->id}}">Delete</a></td>
											</tr>
										</tbody>
										@endforeach
									</table>
									</div>
								</div>
								</div>
							</div>
							<!-- END TABLE HOVER -->
						</div>
					</div>



<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Masukan Data mapel</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>

			      <div class="modal-body">
			        <form action="/mapel/create" method="POST" enctype="multipart/form-data">
			        	{{csrf_field()}}

					  <div class="form-group {{$errors->has('nama') ? 'has-error' : ''}}">
					    <label for="exampleInputEmail1">Nama Mata Pelajaran</label>
					    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nama_depan" placeholder="Nama Mata Pelajaran" name="nama" value="{{old('nama')}}" required="required">
					    @if($errors->has('nama'))
					    	<span class="help-block">{{$errors->first('nama')}}</span>
					    @endif
					  </div>

					  <div class="form-group {{$errors->has('kode') ? 'has-error' : ''}}">
					    <label for="exampleInputEmail1">Kode Mata Pelajaran</label>
					    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nama_depan" placeholder="Kode Mata Pelajaran" name="kode" value="{{old('kode')}}" required="required">
					    @if($errors->has('kode'))
					    	<span class="help-block">{{$errors->first('kode')}}</span>
					    @endif
					  </div>

					  <div class="form-group {{$errors->has('semester') ? 'has-error' : ''}}">
					    <label for="exampleInputEmail1">Semester</label>
					    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nama_depan" placeholder="Semester" name="semester" value="{{old('semester')}}">
					    @if($errors->has('semester'))
					    	<span class="help-block">{{$errors->first('semester')}}</span>
					    @endif
					  </div>

			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Submit</button>
					</form>
			      </div>
			    </div>
			  </div>
				</div>
			</div>
		</div>
@stop

@section('footer')
<script>
	$('.delete').click(function(){
		var mapel_id = $(this).attr('mapel-id');
		swal({
		  title: "Yakin ?",
		  text: "Mau Dihapus Data mapel Ini Dengan ID : "+mapel_id+" ??",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
			console.log(willDelete);
			if (willDelete) {
			window.location = "/mapel/"+mapel_id+"/delete";
		  }
		});
	});
</script>

@endsection