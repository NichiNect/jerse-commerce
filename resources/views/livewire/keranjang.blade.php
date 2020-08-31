<div>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Keranjang</li>
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
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Gambar</th>
							<th scope="col">Keterangan</th>
							<th scope="col">Name Set</th>
							<th scope="col">Jumlah</th>
							<th scope="col">Harga</th>
							<th scope="col">Total Harga</th>
							<th scope="col"></th>

						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						@forelse($pesanan_details as $pesanan_detail)
						<tr>
							<th scope="row">{{ $i++ }}</th>
							<td>
								<img src="{{ url('assets/jersey') }}/{{ $pesanan_detail->product->gambar }}" alt="thumb jersey" class="img-fluid" width="200">
							</td>
							<td>
								{{ $pesanan_detail->product->nama }}
							</td>
							<td>
								@if($pesanan_detail->nameset)
								Nama : <b>{{ $pesanan_detail->nama }}</b> <br>
								Nomor : <b>{{ $pesanan_detail->nomor }}</b>
								@else 
								- 
								@endif
							</td>
							<td>{{ $pesanan_detail->jumlah_pesanan }}</td>
							<td>
								Rp. {{ number_format($pesanan_detail->product->harga) }}
							</td>
							<td>
								Rp. {{ number_format($pesanan_detail->total_harga) }}
							</td>
							<td>
								<button wire:click.prevent="destroy({{ $pesanan_detail->id }})" class="btn btn-danger">
									<i class="fa fa-trash"></i>
								</button>
							</td>
						</tr>
						@empty
						<tr>
							<td colspan="7" class="text-center">
								<h3><b>Data Kosong</b></h3>
							</td>
						</tr>
						@endforelse

						@if(!empty($pesanan))
						<tr>
							<td colspan="6" align="right"><b>Total Harga : </b></td>
							<td align="right"><b>Rp. {{ number_format($pesanan->total_harga) }}</b> </td>
							<td></td>
						</tr>
						<tr>
							<td colspan="6" align="right"><b>Kode Unik : </b></td>
							<td align="right"><b>Rp. {{ number_format($pesanan->kode_unik) }}</b> </td>
							<td></td>
						</tr>
						<tr>
							<td colspan="6" align="right"><b>Total Yang Harus dibayarkan : </b></td>
							<td align="right"><b>Rp. {{ number_format($pesanan->total_harga+$pesanan->kode_unik) }}</b> </td>
							<td></td>
						</tr>
						<tr>
							<td colspan="6"></td>
							<td colspan="2">
								<a href="{{ route('checkout') }}" class="btn btn-success btn-blok">
									<i class="fas fa-arrow-right"></i> Check Out
								</a>
							</td>
						</tr>
						
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
