@extends('layout.master')

@section('content')
<div class="main">
			<div class="main-content">
				<div class="container-fluid">

<div class="col-md-12">
							<!-- TABLE HOVER -->
							<div class="panel">
								<div class="panel-heading">
									<h1 class="panel-title">Data Guru</h1>
									<div class="right">
											<a href="/siswa/exportexcel" class="btn btn-success btn-sm">Export Excel</a>
											<a href="/siswa/exportpdf" class="btn btn-success btn-sm">Export PDF</a>
									</div>
								</div>
								<div class="panel-body">
									<button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal">
									  Tambah Data
									</button>

									<table class="table table-hover">
										<thead>
											<tr>
												<th>Nama Depan</th>
												<th>No Telepon</th>
												<th>Alamat</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											@foreach($data_guru as $guru)
											<tr>
												<td><a href="/guru/{{$guru->id}}/profile"> {{$guru->nama}}</a></td>
												<td>{{$guru->telepon}}</td>
												<td>{{$guru->alamat}}</td>
												<td><a href="/guru/{{$guru->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
												<a href="#" class="btn btn-danger btn-sm delete" guru-id="{{$guru->id}}">Delete</a></td>
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
			        <h5 class="modal-title" id="exampleModalLabel">Masukan Data Guru</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>

			      <div class="modal-body">
			        <form action="/guru/create" method="POST" enctype="multipart/form-data">
			        	{{csrf_field()}}
					  <div class="form-group {{$errors->has('nama_depan') ? 'has-error' : ''}}">
					    <label for="exampleInputEmail1">Nama Lengkap</label>
					    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nama_depan" placeholder="Nama Lengkap" name="nama" value="{{old('nama_depan')}}">
					    @if($errors->has('nama_depan'))
					    	<span class="help-block">{{$errors->first('nama')}}</span>
					    @endif
					  </div>


					  <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
					    <label for="exampleInputEmail1">Email</label>
					    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="nama_belakang" placeholder="Email" name="email" value="{{old('email')}}">
					    @if($errors->has('email'))
					    	<span class="help-block">{{$errors->first('email')}}</span>
					    @endif
					  </div>

					  <div class="form-group {{$errors->has('telepon') ? 'has-error' : ''}}">
					    <label for="exampleInputEmail1">No Telepon</label>
					    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nama_depan" placeholder="Telepon" name="telepon" value="{{old('telepon')}}">
					    @if($errors->has('telepon'))
					    	<span class="help-block">{{$errors->first('telepon')}}</span>
					    @endif
					  </div>

					  <div class="form-group">
					    <label for="alamat">Alamat</label>
					    <textarea class="form-control" id="alamat" rows="3" name="alamat">{{old('alamat')}}</textarea>
					  </div>

					  	<div class="form-group {{$errors->has('avatar') ? 'has-error' : ''}}" >
						    <label for="alamat">Avatar</label>
						    <input type="file" name="avatar" class="form-control">
							 @if($errors->has('avatar'))
						    	<span class="help-block">{{$errors->first('avatar')}}</span>
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
		var guru_id = $(this).attr('guru-id');
		swal({
		  title: "Yakin ?",
		  text: "Mau Dihapus Data Siswa Ini Dengan ID : "+guru_id+" ??",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
			console.log(willDelete);
			if (willDelete) {
			window.location = "/guru/"+guru_id+"/delete";
		  }
		});
	});
</script>

@endsection