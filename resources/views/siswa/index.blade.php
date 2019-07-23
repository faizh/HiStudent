@extends('layout.master')

@section('content')
<div class="main">
			<div class="main-content">
				<div class="container-fluid">

<div class="col-md-12">
							<!-- TABLE HOVER -->
							<div class="panel">
								<div class="panel-heading">
									<h1 class="panel-title">Data Siswa</h1>
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
												<th>Nama Belakang</th>
												<th>Jenis Kelamin</th>
												<th>Agama</th>
												<th>Alamat</th>
												<th>Rata-Rata Nilai</th>
												<th>Jumlah Mapel</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											@foreach($data_siswa as $siswa)
											<tr>
												<td><a href="/siswa/{{$siswa->id}}/profile"> {{$siswa->nama_depan}}</a></td>
												<td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama_belakang}}</a></td>
												<td>{{$siswa->jenis_kelamin}}</td>
												<td>{{$siswa->agama}}</td>
												<td>{{$siswa->alamat}}</td>
												<td>{{$siswa->rataRataNilai()}}</td>
												<td>{{$siswa->jumlahMapel()}}</td>
												<td><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
												<td><a href="#" class="btn btn-danger btn-sm delete" siswa-id="{{$siswa->id}}">Delete</a></td>
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
			        <h5 class="modal-title" id="exampleModalLabel">Masukan Data Siswa</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>

			      <div class="modal-body">
			        <form action="/siswa/create" method="POST" enctype="multipart/form-data">
			        	{{csrf_field()}}
					  <div class="form-group {{$errors->has('nama_depan') ? 'has-error' : ''}}">
					    <label for="exampleInputEmail1">Nama Depan</label>
					    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nama_depan" placeholder="Nama Depan" name="nama_depan" value="{{old('nama_depan')}}">
					    @if($errors->has('nama_depan'))
					    	<span class="help-block">{{$errors->first('nama_depan')}}</span>
					    @endif
					  </div>

					  <div class="form-group">
					    <label for="exampleInputEmail1">Nama Belakang</label>
					    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nama_belakang" placeholder="Nama Belakang" name="nama_belakang" value="{{old('nama_belakang')}}">
					  </div>

					  <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
					    <label for="exampleInputEmail1">Email</label>
					    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="nama_belakang" placeholder="Email" name="email" value="{{old('email')}}">
					    @if($errors->has('email'))
					    	<span class="help-block">{{$errors->first('email')}}</span>
					    @endif
					  </div>

					  <div class="form-group {{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
					    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
					    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
					      <option value="L"{{(old('jenis_kelamin')=='L') ? 'selected' : ''}}>Laki-laki</option>
					      <option value="P"{{(old('jenis_kelamin')=='P') ? 'selected' : ''}}>Perempuan</option>
					    </select>
					    @if($errors->has('jenis_kelamin'))
					    	<span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
					    @endif
					  </div>

					  <div class="form-group {{$errors->has('agama') ? 'has-error' : ''}}">
					    <label for="exampleFormControlSelect1">Agama</label>
					    <select class="form-control" id="agama" name="agama">
					      <option value="Islam">Islam</option>
					      <option value="Kristen">Kristen</option>
					      <option value="Katolik">Katolik</option>
					      <option value="Buddha">Buddha</option>
					      <option value="Konghucu">Konghucu</option>
					    </select>
					    @if($errors->has('agama'))
					    	<span class="help-block">{{$errors->first('agama')}}</span>
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
		var siswa_id = $(this).attr('siswa-id');
		swal({
		  title: "Yakin ?",
		  text: "Mau Dihapus Data Siswa Ini Dengan ID : "+siswa_id+" ??",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
			console.log(willDelete);
			if (willDelete) {
			window.location = "/siswa/"+siswa_id+"/delete";
		  }
		});
	});
</script>

@endsection