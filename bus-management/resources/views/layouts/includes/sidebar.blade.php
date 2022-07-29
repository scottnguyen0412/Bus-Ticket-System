<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="{{url('/')}}" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Dashboard Pannel</span>
		</a>
		<ul class="side-menu top">
			{{-- Check active sidebar --}}
			<li class="{{Request::routeIs('admin.dashboard') ? 'active':'';}}">
				<a  href="{{route('admin.dashboard')}}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="{{Request::routeIs('admin.account.index') ? 'active': '';}}">
				<a href="{{route('admin.account.index')}}">
					<i class='bx bxs-user-circle' ></i>
					<span class="text">Account</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bx-bus' ></i>
					<span class="text">Routes</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text">Team</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="{{route('logout')}}" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->
