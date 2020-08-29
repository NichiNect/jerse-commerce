<div>
	<div class="container">
		<!-- Banner Slider -->
		<div class="banner">
			<img src="{{ asset('assets/slider/jumbotron-jersecommerce.png') }}">
		</div>

		<!-- Pilihan Liga -->
		<section class="pilih-liga mt-5" id="pilih-liga">
			<h3><b>Pilihan Liga</b></h3>
			<div class="row mt-3">
				@foreach($ligas as $liga)
				<div class="col-md">
					<a href="{{ route('products.liga', $liga->id) }}">
						<div class="card my-2">
							<div class="card-body text-center">
								<img src="{{ asset('assets/liga') }}/{{ $liga->gambar }}" alt="liga" class="img-fluid">
							</div>
						</div>	
					</a>
				</div>
				@endforeach
			</div>
		</section>

		<!-- Best Product -->
		<section class="products mt-5" id="product">
			<h3>
				<b>Best Product</b>
				<a href="{{ route('products.index') }}" class="btn btn-dark float-right"><i class="fas fa-eye"></i> Tampilkan Semua</a>
			</h3>
			<div class="row mt-3">
				@foreach($products as $product)
				<div class="col-lg">
					<div class="card my-2">
						<div class="card-body text-center">
							<img src="{{ asset('assets/jersey') }}/{{ $product->gambar }}" alt="liga" class="img-fluid">
							<div class="row">
								<div class="col-md">
									<h5><b>{{ $product->nama }}</b></h5>
									<p>Rp. {{ number_format($product->harga) }}</p>
								</div>
							</div>
							<div class="row mt-2">
								<div class="col-md">
									<a href="{{ route('products.detail', $product->id) }}" class="btn btn-dark btn-block"><i class="fas fa-eye"></i> Detail</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</section>
	</div>
</div>
