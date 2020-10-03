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
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Kode Pemesanan</th>
						<th scope="col">Pesanan</th>
						<th scope="col">Status</th>
						<th scope="col">Tanggal Pesan</th>
						<th scope="col">Total Harga</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					@forelse($semuaPesanan as $pesanan)
					<tr>
						<th scope="row">{{ $i++ }}</th>
						<td>{{ $pesanan->kode_pemesanan }}</td>
						<td>
							<?php $semua_pesanan = \App\PesananDetail::where('pesanan_user_id', $pesanan->id)->get(); ?>
							@foreach($semua_pesanan as $pesananDetail)
							<img src="{{ asset('/storage/images/jersey') }}/{{ $pesananDetail->product->gambar }}" class="img-fluid" width="50">
							{{ $pesananDetail->product->nama }}
							<br>
							@endforeach
						</td>
						<td>
							@if($pesanan->status == 1)
							Belum Lunas
							@elseif($pesanan->status == 2)
							Sedang Diproses
							@elseif($pesanan->status == 3)
							Sedang Dikirim
							@else
							Lunas
							@endif
						</td>
						<td>{{ $pesanan->created_at }}</td>
						<td><b>Rp. {{ number_format($pesanan->total_harga) }}</b></td>
					</tr>
					@empty
					<tr>
						<td colspan="7">Data Kosong</td>
					</tr>
					@endforelse
				</tbody>
			</table>
		</div>

		<div class="row mt-3">
			<div class="col">
				<div class="card shadow">
					<div class="card-body">
						<p>Untuk pembayaran silahkan transfer di rekening dibawah ini : </p>
						<div class="media">
							<img class="mr-3" src="{{ url('assets/bri.png') }}" alt="Bank BRI" width="60">
							<div class="media-body">
								<h5 class="mt-0">BANK BRI</h5>
								No Rekening : 01234-5678-123 a/n <b>Yoni Widhi Cahyadi</b>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
