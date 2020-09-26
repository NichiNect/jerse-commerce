@extends('layouts.admin_template')

@section('nama_user', auth()->user()->name)

@section('content')
<div class="row my-3">
	<div class="col-md-6">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-users-cog"></i> Admin</a></li>
				<li class="breadcrumb-item active" aria-current="page"><i class="fas fa-users"></i> User Management</a></li>
			</ol>
		</nav>
	</div>
</div>

<div class="row">
	<div class="col-lg">
		<h1>Data User JerseCommerce</h1>
		@if (session('success'))
		<div class="alert alert-success my-3">
			{{ session('success') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@endif

		<a href="{{ route('admin.users.create') }}" class="btn btn-outline-primary my-3">
			<i class="fas fa-user-plus"></i> Tambah User Baru
		</a>
	</div>
</div>

<div class="row">
	<div class="col-lg">
		<div class="card">
			<div class="card-body">
				
				<table class="table table-hover" id="tableUser">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nama</th>
							<th scope="col">Role</th>
							<th scope="col">Email</th>
							<th scope="col">No HP</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=0; ?>
						@foreach($users as $user)
						<tr>
							
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


@endsection

@section('scriptjs')
<script>
	$('#tableUser').DataTable({
		processing: true,
		serverside: true,
		ajax: "{{ route('admin.users.getajax') }}",
		columns: [
		{data: 'id', name: 'id'},
		{data: 'name', name: 'nama'},
		{data: 'role', name: 'role'},
		{data: 'email', name: 'email'},
		{data: 'no_hp', name: 'no_hp'},
		{data: 'aksi', name: 'aksi'},
		]
	});
</script>
@endsection