@extends('layout.master')

@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@endsection

@section('content')
<div class="main">
	
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="{{$siswa->getAvatar()}}" class="img-circle" alt="Avatar">
										<h3 class="name">{{$siswa->nama_depan.' '.$siswa->nama_belakang}}</h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
												{{$siswa->mapel->count()}} <span>Mata Pelajaran</span>
											</div>
											<div class="col-md-4 stat-item">
												15 <span>Awards</span>
											</div>
											<div class="col-md-4 stat-item">
												2174 <span>Points</span>
											</div>
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Basic Info</h4>
										<ul class="list-unstyled list-justify">
											<li>Jenis Kelamin <span>
												@if($siswa->jenis_kelamin=='L')Laki-laki @endif
												@if($siswa->jenis_kelamin=='P')Perempuan @endif
											</span></li>
											<li>Agama <span>{{$siswa->agama}}</span></li>
											<li>Alamat <span>{{$siswa->alamat}}</span></li>
										</ul>
									</div>
									<div class="text-center"><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-primary">Edit Profile</a></div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								<!-- AWARDS -->
								<!-- END AWARDS -->
								<!-- TABBED CONTENT -->
								<div class="col-md-12">
									<!-- TABLE STRIPED -->
									<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
								  Tambah Nilai
								</button>
									<div class="panel">
										<div class="panel-heading">
											<h3 class="panel-title">Mata Pelajaran</h3>
										</div>
										<div class="panel-body">
											<table class="table table-striped">
												<thead>
													<tr>
														<th>Kode</th>
														<th>Nama</th>
														<th>Semester</th>
														<th>Nilai</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													@foreach($siswa->mapel as $mapel)
													<tr>
														<td>{{$mapel->kode}}</td>
														<td>{{$mapel->nama}}</td>
														<td>{{$mapel->semester}}</td>
														<td><a href="#" class="nilai" data-type="text" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Masukan Nilai">{{$mapel->pivot->nilai}}</a></td>
														<td><a href="#" class="btn btn-danger btn-sm delete" siswa-id="{{$siswa->id}}" mapel-id="{{$mapel->id}}">Delete</a></td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
									<!-- END TABLE STRIPED -->
								</div>

								<div class="col-md-12">
									<div class="panel">
										<div id="chartNilai"></div>
									</div>
								</div>
								<!-- END TABBED CONTENT -->
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>

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
			        <form action="/siswa/{{$siswa->id}}/addnilai" method="POST" enctype="multipart/form-data">
			        	{{csrf_field()}}

					  <div class="form-group {{$errors->has('matapelajaran') ? 'has-error' : ''}}">
					    <label for="exampleFormControlSelect1">Mata Pelajaran</label>
					    <select class="form-control" id="mapel" name="matapelajaran">
					      @foreach($matapelajaran as $mp)
					      	<option value="{{$mp->id}}">{{$mp->nama}}</option>
					      @endforeach
					    </select>
					    @if($errors->has('matapelajaran'))
					    	<span class="help-block">{{$errors->first('matapelajaran')}}</span>
					    @endif

					   <div class="form-group {{$errors->has('nilai') ? 'has-error' : ''}}">
					    <label for="exampleInputEmail1">Nilai</label>
					    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="nama_depan" placeholder="Nilai" name="nilai" value="{{old('nilai')}}">
					    @if($errors->has('nilai'))
					    	<span class="help-block">{{$errors->first('nilai')}}</span>
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
@endsection

@section('footer')

	<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script>
		Highcharts.chart('chartNilai', {
		    chart: {
		        type: 'column'
		    },
		    title: {
		        text: 'Laporan Nilai Siswa'
		    },
		    xAxis: {
		        categories:{!!json_encode($categories)!!},
		        crosshair: true
		    },
		    yAxis: {
		        min: 0,
		        title: {
		            text: 'Nilai'
		        }
		    },
		    tooltip: {
		        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
		        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
		            '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
		        footerFormat: '</table>',
		        shared: true,
		        useHTML: true
		    },
		    plotOptions: {
		        column: {
		            pointPadding: 0.2,
		            borderWidth: 0
		        }
		    },
		    series: [{
		        name: 'Nilai',
		        data: {!!json_encode($data)!!}
		    }]
		});

		$(document).ready(function() {
		    $('.nilai').editable();
		});
	</script>

	<script>
	$('.delete').click(function(){
		var siswa_id = $(this).attr('siswa-id');
		var mapel_id = $(this).attr('mapel-id');
		swal({
		  title: "Yakin ?",
		  text: "Mau Dihapus Data Pelajaran Ini ??",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
			console.log(willDelete);
			if (willDelete) {
			window.location = "/siswa/"+siswa_id+"/"+mapel_id+"/deletenilai";
		  }
		});
	});
	</script>

@endsection