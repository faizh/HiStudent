@extends('layout.master')

@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@endsection

@section('content')

@if(auth()->user()->level=="admin")
	<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
					<div class="col-md-6">
						<!-- TABLE STRIPED -->
						<!-- <div class="panel"> -->
							<div class="panel panel-headline">
								<div class="panel-body">
									<!-- END PROFILE HEADER -->
									<!-- PROFILE DETAIL -->
									<div class="profile-detail">
										<div class="profile-info">
											<h4 class="heading">Akun Info</h4>
											<ul class="list-unstyled list-justify">
												<li>Level <span>{{$user->level}}</span></li>
												<li>Username <span>{{$user->name}}</span></li>
												<li>Email <span>{{$user->email}}</span></li>
											</ul>
										</div>
										<div class="profile-info">
										<div class="text-center"><a href="#" id="btn-pass" class="btn btn-primary">Ganti Password</a></div>
										<form action="/dashboard/{{auth()->user()->id}}/changepass" method="POST" style="display: none;" id="formPassLama">
											{{csrf_field()}}
											<input type="password" class="form-control" aria-describedby="nama_depan" placeholder="Password Lama" name="password_lama">
											<button type="submit" class="btn btn-primary" style="margin-top: 10px" id="submitPass">Submit</button>
										</form>
									</div>
									</div>
								</div>
						</div>
					</div>

					@if(Session::has('changeable'))
					<div class="col-md-6" id="form1">
						<div class="panel panel-headline">
								<div class="panel-body">
									<h4 class="heading">Ganti Password</h4>
									<form action="/dashboard/{{auth()->user()->id}}/changepass" method="POST">
										{{csrf_field()}}
									    <label for="exampleInputEmail1">Password Baru</label>
									    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="nama_depan" placeholder="Password Baru" name="password_baru" id="pass_baru">

									    <label for="exampleInputEmail1">Ulangi Password Baru</label>
									    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="nama_depan" placeholder="Ulangi Password Baru" name="ulang_password_baru" id="ulang_pass_baru">

									    <button type="submit" class="btn btn-primary" style="margin-top: 10px" id="submitPass">Submit</button>
									</form>
							</div>
							</div>
						</div>
					@endif
					</div>

				</div>
			</div>
		</div>
	</div>


@endif

@if(auth()->user()->level=="siswa")
	@include('siswa.profile');
@endif

@if(auth()->user()->level=="guru")
	@include('guru.profile')
@endif

@endsection
	
@section('footer')
<script>
	$("#btn-pass").click(function(){
    $("#formPassLama").toggle();
    $("#btn-pass").hide();
    $("")
	});
	
</script>
@endsection