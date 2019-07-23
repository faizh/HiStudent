@extends('layout.master')

@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@endsection

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
										<img src="{{$guru->getAvatar()}}" class="img-circle" alt="Avatar">
										<h3 class="name">{{$guru->nama}}</h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
											 {{$guru->mapel->count()}}<span>Mata Pelajaran</span>
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
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
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
									
								</button>
									<div class="panel">
										<div class="panel-heading">
											<h3 class="panel-title">Mata Pelajaran Yang Diajar {{$guru->nama}}</h3>
										</div>
										<div class="panel-body">
											<table class="table table-striped">
												<thead>
													<tr>
														<th>Kode</th>
														<th>Nama</th>
														<th>Semester</th>
													</tr>
												</thead>
												<tbody>
													@foreach($guru->mapel as$mapel)
													<tr>
														<td>{{$mapel->kode}}</td>
														<td>{{$mapel->nama}}</td>
														<td>{{$mapel->semester}}</td>
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

@endsection
