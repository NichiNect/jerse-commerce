@extends('layouts.admin_template')

@section('nama_user', auth()->user()->name)

@section('content')
<div class="row my-3">
	<div class="col-md-6">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-users-cog"></i> Admin</a></li>
				<li class="breadcrumb-item active" aria-current="page"><i class="fas fa-cart-plus"></i> Log History Pesanan</a></li>
			</ol>
		</nav>
	</div>
</div>

<div class="row">
	<div class="col-lg">
		<h2>Log History Pesanan User di JerseCommerce</h2>
		@if (session('success'))
		<div class="alert alert-success my-3">
			{{ session('success') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@endif

	</div>
</div>

<div class="row">
	<div class="col-lg-8">
		<div class="card mt-4">
			<div class="card-header">Data</div>
			<div class="card-body">
				@php $inc = 1; @endphp
				@foreach($pesananUsers as $psUser)
				<div class="card mt-2 py-0">
					<div class="card-body">
						<div class="media">
							<span class="mr-2">{{ $inc++ . '. ' }}</span>
							<img src="{{ asset('assets/img/default-profile.jpg') }}" class="mr-3" width="40">
							<div class="media-body">
                                <h5 class="mt-0">{{ $psUser->user->name }}</h5>
                                <p class="text-muted">{{ $psUser->updated_at . ', ' . $psUser->updated_at->diffForHumans() }}</p>
							</div>
							<a href="{{ route('admin.detaillogpesanan', $psUser->kode_pemesanan) }}" class="btn btn-outline-primary mx-1"><i class="fas fa-eye"></i> Detail</a>
						</div>
					</div>
				</div>
				@endforeach
				{{ $pesananUsers->links() }}
			</div>
		</div>
	</div>
</div>

@endsection
