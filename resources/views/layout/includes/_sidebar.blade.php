<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						@if($active=="dashboard")
							<li><a href="/dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						@else
							<li><a href="/dashboard" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						@endif
						
						@if(auth()->user()->level=='admin')
							@if($active=="siswa")
								<li><a href="/kelas" class="active"><i class="lnr lnr-user"></i> <span>Siswa</span></a></li>
							@else
								<li><a href="/kelas" class=""><i class="lnr lnr-user"></i> <span>Siswa</span></a></li>
							@endif

							@if($active=="guru")
								<li><a href="/guru" class="active"><i class="lnr lnr-user"></i> <span>Guru</span></a></li>
							@else
								<li><a href="/guru" class=""><i class="lnr lnr-user"></i> <span>Guru</span></a></li>
							@endif

							@if($active=="mapel")
								<li><a href="/mapel" class="active"><i class="lnr lnr-book"></i> <span>Mata Pelajaran</span></a></li>
							@else
								<li><a href="/mapel" class=""><i class="lnr lnr-book"></i> <span>Mata Pelajaran</span></a></li>
							@endif
						@endif
							@if($active=="jadwal")
								<li><a href="/jadwal" class="active"><i class="lnr lnr-calendar-full"></i> <span>Jadwal Pelajaran</span></a></li>
							@else
								<li><a href="/jadwal" class=""><i class="lnr lnr-calendar-full"></i> <span>Jadwal Pelajaran</span></a></li>
							@endif

						@if($active=="profile")
							<li><a href="/dashboard/{{auth()->user()->id}}/profile" class="active"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
						@else
							<li><a href="/dashboard/{{auth()->user()->id}}/profile" class=""><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
						@endif

					</ul>
				</nav>
			</div>
		</div>