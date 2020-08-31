<div>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
						<li class="breadcrumb-item"><a href="{{ route('keranjang') }}"><i class="fas fa-shopping-cart"></i> Keranjang</a></li>
						<li class="breadcrumb-item active" aria-current="page">History</li>
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
			<h2>History</h2>
		</div>
	</div>
</div>
