@extends('layouts.admin_template')

@section('nama_user', auth()->user()->name)

@section('content')
<div class="row my-3">
	<div class="col-md-6">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-users-cog"></i> Admin</a></li>
				<li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}"><i class="fas fa-users-cog"></i> User Management</a></li>
				<li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-plus"></i> Tambah User baru</a></li>
			</ol>
		</nav>
	</div>
</div>

<div class="row">
	<div class="col-lg">
		<h1>Form Tambah User Baru</h1>
	</div>
</div>

<div class="row my-3">
	<div class="col-lg">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('admin.users.store') }}" method="post">
					@csrf
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan nama user baru..">
						@error('nama')
						<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan password user baru..">
						@error('password')
						<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group">
						<label for="role">Role</label>
						<select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
							<option selected disabled>-- Pilih Role Untuk User Baru --</option>
							<option value="admin">Role Admin</option>
							<option value="user">Role User</option>
						</select>
						@error('role')
						<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan email user baru..">
						@error('email')
						<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<textarea name="alamat" id="alamat" rows="5" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan alamat user baru.."></textarea>
						@error('alamat')
						<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group">
						<label for="no_hp">Nomer HP</label>
						<input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Masukkan nomer hp user baru..">
						@error('no_hp')
						<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group text-right">
						<button type="submit" name="submit" class="btn btn-outline-success">Buat akun baru!</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


@endsection