@extends('layouts.admin_template')

@section('nama_user', auth()->user()->name)

@section('content')
<div class="row my-3">
	<div class="col-md-6">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-users-cog"></i> Admin</a></li>
				<li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}"><i class="fas fa-tshirt"></i> Product JerseCommerce</a></li>
				<li class="breadcrumb-item active" aria-current="page"><i class="fas fa-edit"></i> Edit Produk</a></li>
			</ol>
		</nav>
	</div>
</div>

<div class="row">
	<div class="col-lg">
		<h1>Form Edit Produk</h1>
	</div>
</div>

<div class="row my-3">
	<div class="col-lg">
		<div class="card">
			<div class="card-body">
				@if($product->updated_at == null)
				<small class="text-muted"><i>Last Update : -</i></small>
				@else
				<small class="text-muted"><i>Last Update : {{ $product->updated_at->diffForHumans() }}, {{ $product->updated_at }}</i></small>
				@endif
				<hr>
				<form action="{{ route('admin.products.update', $product) }}" method="post" enctype="multipart/form-data">
					@csrf
					@method('patch')
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan nama produk baru.." value="{{ $product->nama }}">
						@error('nama')
						<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group">
						<label for="harga">Harga</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">Rp.</span>
							</div>
							<input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Masukkan harga produk baru.." value="{{ $product->harga }}">
						</div>
						@error('harga')
						<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group">
						<label for="harga_nameset">Harga Nameset</label>
						<input type="text" name="harga_nameset" class="form-control @error('harga_nameset') is-invalid @enderror" id="harga_nameset" placeholder="Masukkan harga nameset produk baru.." value="{{ $product->harga_nameset }}">
						@error('harga_nameset')
						<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group">
						<label for="status">Status Stok</label>
						<select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
							<option value="{{ $product->is_ready }}" selected>
								@if($product->is_ready == 1)
								Ready
								@else
								Stok Kosong
								@endif
							</option>
							<option disabled>-- Pilih Status Stok --</option>
							<option value="1">Ready</option>
							<option value="0">Stok Kosong</option>
						</select>
						@error('status')
						<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group">
						<label for="jenis">Jenis</label>
						<input type="text" name="jenis" class="form-control @error('jenis') is-invalid @enderror" id="jenis" placeholder="Masukkan jenis produk baru.." value="{{ $product->jenis }}">
						@error('jenis')
						<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group">
						<label for="berat">Berat (Kg)</label>
						<input type="text" name="berat" class="form-control @error('berat') is-invalid @enderror" id="berat" placeholder="Masukkan berat produk baru.." value="{{ $product->berat }}">
						@error('berat')
						<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group">
						<label for="gambar">Gambar</label>
						<div class="row">
							<div class="col-md-2">
								<img src="{{ $product->TakeJerseyImage }}" class="img-thumbnail img-fluid" width="100">
							</div>
							<div class="col-md">
								<div class="custom-file">
									<input type="file" name="gambar" class="custom-file-input @error('gambar') is-invalid @enderror" id="gambar">
									<label class="custom-file-label" for="gambar">Choose file</label>
								</div>
							</div>
						</div>
						@error('gambar')
						<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group">
						<label for="liga">Liga</label>
						<select name="liga" id="liga" class="form-control @error('liga') is-invalid @enderror">
							<option value="{{ $product->liga_id }}">{{ $product->liga_id . ' - ' . $product->liga->nama }}</option>
							<option disabled>-- Pilih liga --</option>
							@foreach($liga as $lig)
							<option value="{{ $lig->id }}">{{ $lig->id . ' - ' . $lig->nama }}</option>
							@endforeach
						</select>
						@error('liga')
						<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group text-right">
						<button type="submit" name="submit" class="btn btn-outline-success">Edit Produk!</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scriptjs')
<script>
	$('.custom-file-input').on('change', function() {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(fileName);
	});
</script>
@endsection