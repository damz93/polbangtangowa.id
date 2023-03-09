<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
	<div class="position-sticky pt-3 sidebar-sticky">




		<ul class="nav flex-column">


{{-- 
			<ul class="nav flex-column pt-3 pt-md-0"> --}}
				{{-- <li class="nav-item">
					<a href="#" class="nav-link d-flex align-items-center">
						<img src="/img/logo_tamuku_.jpg" alt="Logo tamuku" width="20px">
					<br>
					tamuku-polbangtangowa.id
					</a>
				</li>
			
			<br>
			 --}}


			<li class="nav-item">
				<a class="nav-link {{ Request::is('admin-access/dashboard*')? 'active': '' }}" aria-current="page" href="/admin-access/dashboard">					
					<i class="bi bi-house-fill align-text-center"></i>
				Dashboard
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{ Request::is('admin-access/kunjungan*')? 'active': '' }}" href="/admin-access/kunjungan">				
					<i class="bi bi-geo-fill align-text-center"></i>
				Kunjungan
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{ Request::is('admin-access/pegawai*')? 'active': '' }}" href="/admin-access/pegawai">
					<i class="bi bi-people align-text-center"></i>
				Pegawai
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{ Request::is('admin-access/user*')? 'active': '' }}" href="/admin-access/user">
					<i class="bi bi-person-circle align-text-center"></i>
				User Admin
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{ Request::is('admin-access/pekerjaan*')? 'active': '' }}" href="/admin-access/pekerjaan">
					<i class="bi bi-hdd-network align-text-center"></i>
				List Pekerjaan            
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{ Request::is('admin-access/keperluan*')? 'active': '' }}" href="/admin-access/keperluan">
					<i class="bi bi-card-checklist align-text-center"></i>
				List Keperluan
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{ Request::is('admin-access/tamu*')? 'active': '' }}" href="/admin-access/tamu">				
				<i class="bi bi-person-check-fill align-text-center"></i>
				List Tamu
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{ Request::is('admin-access/kepuasan*')? 'active': '' }}" href="/admin-access/kepuasan">
					<i class="bi bi-stars"></i>
				List Kepuasan
				</a>
			</li>
		</ul>
	</div>
</nav>