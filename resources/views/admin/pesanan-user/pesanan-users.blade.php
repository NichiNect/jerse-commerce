@extends('layouts.admin_template')

@section('nama_user', auth()->user()->name)

@section('content')
<div class="row my-3">
	<div class="col-md-6">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-users-cog"></i> Admin</a></li>
				<li class="breadcrumb-item active" aria-current="page"><i class="fas fa-cart-plus"></i> Permintaan Konfirmasi User</a></li>
			</ol>
		</nav>
	</div>
</div>

<div class="row">
	<div class="col-lg">
		<h2>Permintaan Konfirmasi Pesanan User di JerseCommerce</h2>
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
								<ul>
									@foreach($psUser->pesanan_details as $detail)
									<li>
										{{ $detail->product->nama }}
									</li>
									@endforeach
								</ul>
							</div>
							<a href="" class="btn btn-outline-primary mx-1"><i class="fas fa-eye"></i> Detail</a>
							<form action="{{ route('admin.pesananuser.confirm', $psUser->id) }}" method="post" class="d-inline mx-1">
								@csrf
								@method('patch')
								<button class="btn btn-outline-success" onclick="return confirm('Apakah anda yakin ingin mengonfirmasi Pesanan ini?');"><i class="fas fa-check"></i> Konfirmasi</button>
							</form>
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

@section('scriptjs')
<script>
	function asd(e) {
		e.preventDefault();
		alert('oawkaow');
	}
</script>
@endsection