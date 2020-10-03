<div>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">List Jersey</li>
					</ol>
				</nav>
			</div>
		</div>

		<div class="row mt-2">
			<div class="col-md-8">
				<h3><b>{{ $title }}</b></h3>
			</div>
			<div class="col-md-4">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
					</div>
					<input type="text" name="search" id="search" wire:model="search" class="form-control" placeholder="Search..">
				</div>
			</div>
		</div>

		<!-- Best Product -->
		<section class="products mt-3" id="product">
			<div class="row mt-3">
				@foreach($products as $product)
				<div class="col-lg-3">
					<div class="card my-2">
						<div class="card-body text-center">
							<img src="{{ $product->TakeJerseyImage }}" alt="liga" class="img-fluid">
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
			<div class="row">
				<div class="col-md">
					{{ $products->links() }}
				</div>
			</div>
		</section>

	</div>
</div>
