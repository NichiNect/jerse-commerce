@extends('layouts.admin_template')

@section('nama_user', auth()->user()->name)

@section('content')
<div class="row my-3">
	<div class="col-md-6">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-users-cog"></i> Admin</a></li>
				<li class="breadcrumb-item active" aria-current="page"><i class="fas fa-tshirt"></i> Product JerseCommerce</a></li>
			</ol>
		</nav>
	</div>
</div>

<div class="row">
	<div class="col-lg">
		<h1>Data Semua Produk JerseCommerce</h1>
		@if (session('success'))
		<div class="alert alert-success my-3">
			{{ session('success') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@endif

		<a href="{{ route('admin.products.create') }}" class="btn btn-outline-primary my-3">
			<i class="fas fa-plus"></i> Tambah Product
		</a>
	</div>
</div>

<div class="row">
	<div class="col-lg">
		<div class="card">
			<div class="card-body">
				<table class="table table-hover table-responsive" id="tableProduct">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nama Product</th>
							<th scope="col">Gambar</th>
							<th scope="col">Liga</th>
							<th scope="col">Harga</th>
							<th scope="col">Status Barang</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $product)
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

@include('layouts.partials.modal')

@section('scriptjs')
<script>
	$(document).ready(function() {
		$('#tableProduct').DataTable({
			processing: true,
			serverside: true,
			ajax: "{{ route('admin.products.getajax') }}",
			columns: [
			{data: 'id', name: 'id'},
			{data: 'nama', name: 'nama'},
			{data: 'imgJersey', name: 'imgJersey'},
			{data: 'liga', name: 'liga'},
			{data: 'hargaJersey', name: 'hargaJersey'},
			{data: 'status', name: 'status'},
			{data: 'aksi', name: 'aksi'},
			]
		});

		$('.table').on('click', '#showDetailProduct', function(e) {
			e.preventDefault();

			const tombol = $(this);
			const url = tombol.attr('href');

			$.ajax({
				url: url,
				dataType: 'html',
				method: 'get',
				success: function(res) {
					$('.modal-body').html(res);
				}
			});

			$('.modal-title').html('Detail Product');
			$('.modal-dialog').addClass('modal-lg');
			$('.modal #ok').remove();
			$('#componentModal').modal('show');
		});
	});
</script>
@endsection