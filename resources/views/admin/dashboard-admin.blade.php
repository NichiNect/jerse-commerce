@extends('layouts.admin_template')

@section('nama_user', auth()->user()->name)

@section('content')
<div class="row my-3">
	<div class="col-md-6">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-users-cog"></i> Admin</a></li>
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
			</ol>
		</nav>
	</div>
</div>

<div class="row">
	<div class="col-md-3 mt-2">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total User yang Tergabung</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUser }}</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-users fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3 mt-2">
		<div class="card border-left-warning shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Transaksi Menunggu Konfirmasi</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pesananUser }}</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3 mt-2">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Produk</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $products }}</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-tshirt fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection