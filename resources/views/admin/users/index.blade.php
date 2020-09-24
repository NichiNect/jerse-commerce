@extends('layouts.admin_template')

@section('nama_user', auth()->user()->name)

@section('content')
<div class="row">
	<div class="col-lg">
		<h1>Data User JerseCommerce</h1>
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
							<th scope="row">{{ $i++ }}</th>
							<td>{{ $user->name }}</td>
							<td>{{ $user->role }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->no_hp }}</td>
							<td>
								<a href="#" class="btn btn-success"><i class="fas fa-user"></i> Detail</a>
								<a href="#" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
								<a href="#" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
							</td>
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
	$('#tableUser').DataTable();
</script>
@endsection