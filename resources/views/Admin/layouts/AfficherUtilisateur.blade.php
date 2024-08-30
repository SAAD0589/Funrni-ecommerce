@extends('Admin.layouts.ParentPage')

@section('content')
    	<!-- CONTENT -->
	<section id="content">
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Afficher Utilisateurs</a>
						</li>
					</ul>
				</div>
		
			</div>

			<div class="table-data">
				<div class="order w-100">
					<div class="head">
						<h3>Les Utilisateurs</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>User</th>
								<th>Email</th>
								<th>Telephone</th>
							</tr>
						</thead>
						<tbody>
							
							@foreach ($users as $user)
							<tr>
								<td>
									<img src={{$user->image}}>
									<p>{{$user->name}} {{$user->prenom}}</p>
								</td>
								<td>{{$user->email }}</td>
								<td>{{$user->telephone}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
@endsection