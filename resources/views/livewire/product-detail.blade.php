<div>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
						<li class="breadcrumb-item">List Jersey</li>
						<li class="breadcrumb-item active" aria-current="page">Detail Jersey</li>
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

		<div class="row mt-3">
			<div class="col-md-6">
				<div class="card gambar-detail-product">
					<div class="card-body">
						<img src="{{ asset('assets/jersey') }}/{{ $product->gambar }}" alt="liga" class="img-fluid">
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<h2><b>{{ $product->nama }}</b></h2>

				@if($product->is_ready == 1)
				<span class="badge badge-success"><i class="fas fa-check"></i> Ready Stok</span>
				@else
				<span class="badge badge-danger"><i class="fas fa-times"></i> Stok Habis</span>
				@endif

				<h4 class="mt-3">Rp. {{ number_format($product->harga) }}</h4>

				<hr>
				
				<div class="row">
					<div class="col">
						<form wire:submit.prevent="masukkanKeranjang">
							
							<table class="table" style="border-top: hidden;">

								<tr>
									<td>Liga</td>
									<td>:</td>
									<td>
										<img src="{{ asset('assets/liga') }}/{{ $product->liga->gambar }}" alt="liga" class="img-fluid" width="70">
									</td>
								</tr>
								<tr>
									<td>Jenis</td>
									<td>:</td>
									<td>{{ $product->jenis }}</td>
								</tr>
								<tr>
									<td>Berat</td>
									<td>:</td>
									<td>{{ $product->berat }} kg</td>
								</tr>
								<tr>
									<td>Jumlah Pesan</td>
									<td>:</td>
									<td>
										<input id="jumlah_pesan" type="number" class="form-control @error('jumlah_pesan') is-invalid @enderror" wire:model="jumlah_pesan" name="jumlah_pesan" value="{{ old('jumlah_pesan') }}" required min="1" placeholder="Masukkan jumlah pesan..">

										@error('jumlah_pesan')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</td>
								</tr>
								{{-- Check how many bid --}}
								@if($jumlah_pesan > 1)
								@else
								<tr>
									<td colspan="3">
										<p><b>Name Set (isi jika anda ingin memesan jersey dengan nameset)</b></p>
										<p>Harga Name Set : Rp. {{ number_format($product->harga_nameset) }}</p>
									</td>
								</tr>
								<tr>
									<td>Nama</td>
									<td>:</td>
									<td>
										<input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" wire:model="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama..">

										@error('nama')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</td>
								</tr>
								<tr>
									<td>Nomor Punggung</td>
									<td>:</td>
									<td>
										<input id="nomor" type="number" class="form-control @error('nomor') is-invalid @enderror" wire:model="nomor" name="nomor" value="{{ old('nomor') }}" placeholder="Masukkan nomor punggung..">

										@error('nomor')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</td>
								</tr>
								@endif
								<tr>
									<td colspan="3">
										<button type="submit" class="btn btn-dark btn-block"><i class="fas fa-shopping-cart mr-1" <?php if ($product->is_ready !== 1): ?> disabled <?php endif ?> ></i> Masukkan Keranjang</button>
									</td>
								</tr>
							</table>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
