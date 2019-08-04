@extends('layout.master')

@section('content')
<div class="main">
			<div class="main-content">
				<div class="container-fluid">

<div class="col-md-12">
							<!-- TABLE HOVER -->
							<div class="panel">
								<div class="panel-heading">
									<h1 class="panel-title">Kelas</h1>
									<div class="right">
											<a href="/siswa" class="btn btn-primary btn-sm">Lihat Semua Siswa</a>
									</div>
								</div>
								<div class="panel-body">
									<button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal">
									  Tambah Data
									</button>

									<table class="table table-hover">
										<thead>
											<tr>
												<th>Kelas</th>
												<th>Wali Kelas</th>
												<th>Jumlah Siswa</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>

											@foreach($kelas as $k)
											@php
											$count=0;
											@endphp
											<tr>
												<td><a href="/kelas/{{$k->id}}/siswa">{{$k->nama}}</a></td>
												<td>
													@foreach($wali as $w)
														@if($w->id==$k->guru_id)
															{{$w->nama}}
														@endif
													@endforeach
												</td>
												<td>
													@foreach($siswa as $s)
														@if($k->id==$s->kelas_id)
															@php
															$jumlah = $count++
															@endphp
														@endif
													@endforeach
															{{$count}}
												</td>
												<td><a href="/kelas/{{$k->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
												<a href="#" class="btn btn-danger btn-sm delete" kelas-id="{{$k->id}}">Delete</a></td>
											</tr>
											@endforeach
										</tbody>
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
			        <form action="/kelas/create" method="POST" enctype="multipart/form-data">
			        	{{csrf_field()}}
			       		
					  <div class="form-group {{$errors->has('nama') ? 'has-error' : ''}}">
					    <label for="exampleInputEmail1">Nama Kelas</label>
					    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nama_depan" placeholder="Kelas" name="nama" value="{{old('nama')}}">
					    @if($errors->has('nama_depan'))
					    	<span class="help-block">{{$errors->first('nama')}}</span>
					    @endif
					  </div>

			       		<div class="form-group {{$errors->has('guru_id') ? 'has-error' : ''}}">
						    <label for="exampleFormControlSelect1">Wali Kelas</label>
						    <select class="form-control" id="mapel" name="guru_id">
						    	@foreach($wali as $w)
						    		<option value="{{$w->id}}">{{$w->nama}}</option>
						    	@endforeach
						    </select>
						    @if($errors->has('guru_id'))
						    	<span class="help-block">{{$errors->first('guru_id')}}</span>
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
		var kelas_id = $(this).attr('kelas-id');
		swal({
		  title: "Yakin ?",
		  text: "Mau Dihapus Data Siswa Ini Dengan ID : "+kelas_id+" ??",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
			console.log(willDelete);
			if (willDelete) {
			window.location = "/kelas/"+kelas_id+"/delete";
		  }
		});
	});
</script>

@endsection