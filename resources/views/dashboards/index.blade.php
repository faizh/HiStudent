@extends('layout.master')

@section('content')
	<div class="main">
		<!-- MAIN CONTENT -->
		<div class="main-content">
			<div class="container-fluid">
				<div class="row">
				<div class="col-md-6">
					<!-- TABLE STRIPED -->
					<!-- <div class="panel"> -->
						<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Rangking Paralel</h3>
						</div>
						<div class="panel-body">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Rangking</th>
										<th>Nama</th>
										<th>Nilai</th>
									</tr>
								</thead>
								<tbody>
									@php
									$no=1
									@endphp
									@foreach(rangkingParalel() as $siswa)
									<tr>
										<td>{{$no++}}</td>
										<td>{{$siswa->namaLengkap()}}</td>
										<td>{{$siswa->rataRataNilai()}}
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
					<!-- END TABLE STRIPED -->
		

				<div class="col col-md-6">
						<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Weekly Overview</h3>
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-md-6">
											<div class="metric">
												<span class="icon"><i class="lnr lnr-graduation-hat"></i></span>
												<p>
													<span class="number">{{totalSiswa()}}</span>
													<span class="title">Siswa</span>
												</p>
											</div>
										</div>
										<div class="col-md-6">
											<div class="metric">
												<span class="icon"><i class="lnr lnr-user"></i></span>
												<p>
													<span class="number">{{totalGuru()}}</span>
													<span class="title">Guru</span>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection