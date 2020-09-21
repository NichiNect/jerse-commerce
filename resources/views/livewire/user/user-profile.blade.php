<div>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">User Profile</li>
					</ol>
				</nav>
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-md">
				@if(session()->has('message'))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					{{ session('message') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				@endif
			</div>
		</div>

		<div class="row mt3">
			<div class="col-lg">
				<div class="card">
					<div class="card-header">
						Profil Pengguna : {{ $dataUser->name }}
					</div>
					<div class="card-body">
						<h5 class="card-title">Detail Pengguna</h5>
						<div class="row my-3">
							<div class="col-md-5">
								<div class="card justify-content-center">
									<div class="card-body">
										<table class="table table-hover">
											<thead>
												<tr>
													<th scope="col">#</th>
													<th scope="col"></th>
													<th scope="col">Data User</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Nama</td>
													<td>:</td>
													<td>{{ $dataUser->name }}</td>
												</tr>
												<tr>
													<td>Email</td>
													<td>:</td>
													<td>{{ $dataUser->email }}</td>
												</tr>
												<tr>
													<td>Alamat</td>
													<td>:</td>
													@if(empty($dataUser->alamat))
													<td>-</td>
													@else
													<td>{{ $dataUser->alamat }}</td>
													@endif
												</tr>
												<tr>
													<td>No HP</td>
													<td>:</td>
													@if(empty($dataUser->no_hp))
													<td>-</td>
													@else
													<td>{{ $dataUser->no_hp }}</td>
													@endif
												</tr>
												<tr>
													<td>Bergabung pada</td>
													<td>:</td>
													<td>{{ $dataUser->created_at }}</td>
												</tr>
											</tbody>
										</table>
										<small class="text-muted">Terakhir diperbarui pada : {{ $dataUser->updated_at->diffForHumans() }}</small>
									</div>
								</div>

								<a href="" class="">Ingin mengganti Password?</a>
								
							</div>
							<div class="col-md-7">
								<livewire:user.edit-profile :dataUser="$dataUser"></livewire:user.edit-profile>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
