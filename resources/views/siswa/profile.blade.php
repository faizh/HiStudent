@extends('layout.master')

@section('content')
<div class="main">
	
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					@if(session('sukses'))
						<div class="alert alert-success" role="alert">
						  {{session('sukses')}}
						</div>
					@elseif(session('error'))
						<div class="alert alert-danger" role="alert">
						  {{session('error')}}
						</div>
					@endif
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
														
													</tr>
												</thead>
												<tbody>
													@foreach($siswa->mapel as $mapel)
													<tr>
														<td>{{$mapel->kode}}</td>
														<td>{{$mapel->nama}}</td>
														<td>{{$mapel->semester}}</td>
														<td>{{$mapel->pivot->nilai}}</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
									<!-- END TABLE STRIPED -->
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