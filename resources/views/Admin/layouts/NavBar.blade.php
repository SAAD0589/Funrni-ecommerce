	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">AdminHub</span>
		</a>
		<ul class="side-menu top">
			<li class="{{ request()->routeIs('DashboardAdmin') ? 'active' : '' }}">
				<a href="{{route('DashboardAdmin')}}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="{{ request()->routeIs('AjouteProduit') ? 'active' : '' }}">
				<a href="{{route('AjouteProduit')}}">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Ajoute Produit</span>
				</a>
			</li>
			<li class="{{ request()->routeIs('AfficherUtilisateurs') ? 'active' : '' }}">
				<a href="{{route('AfficherUtilisateurs')}}">
					<i class='bx bxs-group' ></i>
					<span class="text">Utilisateurs</span>
				</a>
			</li>
			@if (Auth::check())
			<li class="nav-item mt-2">
				<a class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
			@endif
		</ul>
		
	</section>
	<!-- SIDEBAR -->