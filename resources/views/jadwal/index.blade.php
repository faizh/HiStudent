@extends('layout.master')

@section('content')
<div class="main">
			<div class="main-content">
				<div class="container-fluid">

					<div class="col-md-12">
							<!-- TABLE HOVER -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Jadwal Pelajaran</h3>
								</div>
								<div class="panel-body">
								<div class="col-md-12">
									<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" style="margin-bottom: 15px">
									  Atur Jadwal
									</button>
								</div>
									<div class="row-md-6">
										<div class="col-md-4">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>Jam</th>
														<th colspan="4">Senin</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>#</td>
														<td>XII RPL 1</td>
														<td>XII RPL 2</td>
														<td>XII RPL 3</td>
														<td>XII RPL 4</td>
													</tr>
													@php
													$i=1;
													@endphp
													@foreach(dataJadwal('senin') as $jadwal)
													<tr>
														<td>{{$i++}}</td>
														<td>{{$jadwal->rpl1}}</td>
														<td>{{$jadwal->rpl2}}</td>
														<td>{{$jadwal->rpl3}}</td>
														<td>{{$jadwal->rpl4}}</td>
														@if($i==3 or $i==7)
														<tr>
															
															<td colspan="5" style="text-align: center">Istirahat</td>
														</tr>
														@endif
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>

										<div class="col-md-4">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>Jam</th>
														<th colspan="4">Selasa</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>#</td>
														<td>XII RPL 1</td>
														<td>XII RPL 2</td>
														<td>XII RPL 3</td>
														<td>XII RPL 4</td>
													</tr>
													@php
													$i=1;
													@endphp
													@foreach(dataJadwal('selasa') as $jadwal)
													<tr>
														<td>{{$i++}}</td>
														<td>{{$jadwal->rpl1}}</td>
														<td>{{$jadwal->rpl2}}</td>
														<td>{{$jadwal->rpl3}}</td>
														<td>{{$jadwal->rpl4}}</td>
														@if($i==3 or $i==7)
														<tr>
															
															<td colspan="5" style="text-align: center">Istirahat</td>
														</tr>
														@endif
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>

										<div class="col-md-4">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>Jam</th>
														<th colspan="4">Rabu</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>#</td>
														<td>XII RPL 1</td>
														<td>XII RPL 2</td>
														<td>XII RPL 3</td>
														<td>XII RPL 4</td>
													</tr>
													@php
													$i=1;
													@endphp
													@foreach(dataJadwal('rabu') as $jadwal)
													<tr>
														<td>{{$i++}}</td>
														<td>{{$jadwal->rpl1}}</td>
														<td>{{$jadwal->rpl2}}</td>
														<td>{{$jadwal->rpl3}}</td>
														<td>{{$jadwal->rpl4}}</td>
														@if($i==3 or $i==7)
														<tr>
															<td colspan="5" style="text-align: center">Istirahat</td>
														</tr>
														@endif
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>

									<div class="row-md-6">
										<div class="col-md-4">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>Jam</th>
														<th colspan="4">Kamis</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>#</td>
														<td>XII RPL 1</td>
														<td>XII RPL 2</td>
														<td>XII RPL 3</td>
														<td>XII RPL 4</td>
													</tr>
													@php
													$i=1;
													@endphp
													@foreach(dataJadwal('kamis') as $jadwal)
													<tr>
														<td>{{$i++}}</td>
														<td>{{$jadwal->rpl1}}</td>
														<td>{{$jadwal->rpl2}}</td>
														<td>{{$jadwal->rpl3}}</td>
														<td>{{$jadwal->rpl4}}</td>
														@if($i==3 or $i==7)
														<tr>															
															<td colspan="5" style="text-align: center">Istirahat</td>
														</tr>
														@endif
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>

										<div class="col-md-4">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>Jam</th>
														<th colspan="4">Jumat</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>#</td>
														<td>XII RPL 1</td>
														<td>XII RPL 2</td>
														<td>XII RPL 3</td>
														<td>XII RPL 4</td>
													</tr>
													@php
													$i=1;
													@endphp
													@foreach(dataJadwal('jumat') as $jadwal)
													<tr>
														<td>{{$i++}}</td>
														<td>{{$jadwal->rpl1}}</td>
														<td>{{$jadwal->rpl2}}</td>
														<td>{{$jadwal->rpl3}}</td>
														<td>{{$jadwal->rpl4}}</td>
														@if($i==3 or $i==7)
														<tr>															
															<td colspan="5" style="text-align: center">Istirahat</td>
														</tr>
														@endif
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
			        <h5 class="modal-title" id="exampleModalLabel">Masukan Data Siswa</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>

			      <div class="modal-body">
			        <form action="/jadwal/create" method="POST" enctype="multipart/form-data">
			        	{{csrf_field()}}
					  <div class="form-group {{$errors->has('nama_depan') ? 'has-error' : ''}}">
					    <label for="exampleInputEmail1">Hari</label>
					    <select class="form-control" id="jenis_kelamin" name="hari">
					    	<option value="senin">Senin</option>
					    	<option value="selasa">Selasa</option>
					    	<option value="rabu">Rabu</option>
					    	<option value="kamis">Kamis</option>
					    	<option value="jumat">Jumat</option>
					    </select>
					    @if($errors->has('nama_depan'))
					    	<span class="help-block">{{$errors->first('nama_depan')}}</span>
					    @endif
					  </div>

					  <div class="form-group {{$errors->has('nama_depan') ? 'has-error' : ''}}">
					    <label for="exampleInputEmail1">Jam Ke</label>
					    <select class="form-control" id="jenis_kelamin" name="jam">
					    	@for($i=1;$i<=10;$i++)
					    	<option value="{{$i}}">Jam Ke-{{$i}}</option>
					    	@endfor
					    </select>
					    @if($errors->has('nama_depan'))
					    	<span class="help-block">{{$errors->first('nama_depan')}}</span>
					    @endif
					  </div>

					  <div class="form-group {{$errors->has('nama_depan') ? 'has-error' : ''}}">
					    <label for="exampleInputEmail1">Kelas</label>
					    <select class="form-control" id="jenis_kelamin" name="kelas">
					    	<option value="rpl1">XII RPL 1</option>
					    	<option value="rpl2">XII RPL 2</option>
					    	<option value="rpl3">XII RPL 3</option>
					    	<option value="rpl4">XII RPL 4</option>
					    </select>
					    @if($errors->has('nama_depan'))
					    	<span class="help-block">{{$errors->first('nama_depan')}}</span>
					    @endif
					  </div>

					  <div class="form-group {{$errors->has('nama_depan') ? 'has-error' : ''}}">
					    <label for="exampleInputEmail1">Pelajaran</label>
					    <select class="form-control" id="jenis_kelamin" name="mapel">
					    	@foreach(dataMapel() as $mp)
					    		<option value="{{$mp->kode}}">{{$mp->nama}}</option>
					    	@endforeach
					    </select>
					    @if($errors->has('nama_depan'))
					    	<span class="help-block">{{$errors->first('nama_depan')}}</span>
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