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

				<div class="col-md-6">
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
									<div class="row">
										<div class="col-md-6">
												<div class="metric">
													<span class="icon"><i class="lnr lnr-book"></i></span>
													<p>
														<span class="number">{{totalMapel()}}</span>
														<span class="title">Mata Pelajaran</span>
													</p>
												</div>
											</div>
											
										</div>
								</div>
								</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Jadwal Pelajaran</h3>
								</div>
								<div class="panel-body">
									<table class="table table-bordered table-striped" >
											<thead>
												<tr>
													<th>Jam</th>
													<th colspan="4">{{namaHari()}}</th>
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
												$hari=date('D');
												@endphp
												@foreach(dataJadwal($hari) as $jadwal)
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
			</div>
		</div>
	</div>
@endsection