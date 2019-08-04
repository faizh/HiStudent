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
										<img src="{{$guru->getAvatar()}}" class="img-circle" alt="Avatar">
										<h3 class="name">{{$guru->nama}}</h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
											1 <span>Mata Pelajaran</span>
											</div>
											<div class="col-md-4 stat-iftem">
											15 <span>Awards</span>
											</div>
											<div class="col-md-4 stat-item">
											2174 <span>Points</span>
											</div>
										</div>
									</div>
								</div>
									<div class="panel">
										<div class="profile-detail">
											<div class="profile-info">
												<h4 class="heading">Basic Info</h4>
												<ul class="list-unstyled list-justify">
													<li>Jenis Kelamin <span>{{$guru->alamat}}</span></li>
													<li>Agama <span>{{$guru->telepon}}</span></li>
												</ul>
												@if(auth()->user()->level=="admin")
													<div class="text-center"><a href="/guru/{{$guru->id}}/edit" class="btn btn-primary">Edit Profile</a></div>
												@endif

												@if(auth()->user()->level=="guru")
												<h4 class="heading">Akun Info</h4>
												<ul class="list-unstyled list-justify">
													<li>Level <span>{{auth()->user()->level}}</span></li>
													<li>Username <span>{{auth()->user()->name}}</span></li>
													<li>Email <span>{{auth()->user()->email}}</span></li>
												</ul>

												<div class="text-center"><a href="#" id="btn-pass" class="btn btn-primary">Ganti Password</a></div>
												<form action="/dashboard/{{auth()->user()->id}}/changepass" method="POST" style="display: none;" id="formPassLama">
													{{csrf_field()}}
													<input type="password" class="form-control" aria-describedby="nama_depan" placeholder="Password Lama" name="password_lama">
													<button type="submit" class="btn btn-primary" style="margin-top: 10px" id="submitPass">Submit</button>
												</form>

												@if(Session::has('changeable'))
													<h4 class="heading" style="margin-top: 15px">Ganti Password</h4>
													<form action="/dashboard/{{auth()->user()->id}}/changepass" method="POST">
														{{csrf_field()}}
													    <label for="exampleInputEmail1">Password Baru</label>
													    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="nama_depan" placeholder="Password Baru" name="password_baru" id="pass_baru">

													    <label for="exampleInputEmail1">Ulangi Password Baru</label>
													    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="nama_depan" placeholder="Ulangi Password Baru" name="ulang_password_baru" id="ulang_pass_baru">

													    <button type="submit" class="btn btn-primary" style="margin-top: 10px" id="submitPass">Submit</button>
													</form>
												@endif

												@endif
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
													<tr>
														<td>{{$mapel->kode}}</td>
														<td>{{$mapel->nama}}</td>
														<td>{{$mapel->semester}}</td>
													</tr>
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

@endsection
