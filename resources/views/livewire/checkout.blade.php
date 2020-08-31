<div>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
						<li class="breadcrumb-item"><a href="{{ route('keranjang') }}"><i class="fas fa-shopping-cart"></i> Keranjang</a></li>
						<li class="breadcrumb-item active" aria-current="page">Checkout</li>
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
			<div class="col-lg-6">
				<h3>Informasi Pembayaran</h3>
				<hr>
				<p>Untuk pembayaran silahkan transfer pada rekening dibawah ini dengan nnominal sebesar : <b>Rp. {{ number_format($totalHarga) }}</b></p>
				<div class="media">
					<img src="{{ asset('/assets/bri.png') }}" class="mr-3" alt="Bank BRI" width="60">
					<div class="media-body">
						<h5 class="mt-0">Bank BRI</h5>
						No Rekening : 01234-5678-123 a/n <b>Yoni Widhi Cahyadi</b>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<h3>Informasi Pengiriman</h3>
				<hr>
				<form wire:submit.prevent="checkout">
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" wire:model="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan nama.." value="{{ old('nama') }}">
						@error('nama')
						<span class="invalid-feedback" role="alert">
							<b>{{ $message }}</b>
						</span>
						@enderror
					</div>
					<div class="form-group">
						<label for="noHP">No. HP</label>
						<input type="text" wire:model="noHP" class="form-control @error('noHP') is-invalid @enderror" id="noHP" placeholder="Masukkan nomor hp.." value="{{ old('noHP') }}">
						@error('noHP')
						<span class="invalid-feedback" role="alert">
							<b>{{ $message }}</b>
						</span>
						@enderror
					</div>
					<div class="form-group">
						<label for="nama">Alamat</label>
						<textarea wire:model="alamat" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan alamat.." value="{{ old('alamat') }}"></textarea>
						@error('alamat')
						<span class="invalid-feedback" role="alert">
							<b>{{ $message }}</b>
						</span>
						@enderror
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success btn-block">
							<i class="fas fa-arrow-right"></i>
							Checkout
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
