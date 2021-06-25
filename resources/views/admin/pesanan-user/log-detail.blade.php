@extends('layouts.admin_template')

@section('nama_user', auth()->user()->name)

@section('content')
<div class="row my-3">
	<div class="col-md-6">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-users-cog"></i> Admin</a></li>
				<li class="breadcrumb-item active" aria-current="page"><i class="fas fa-cart-plus"></i> Log History Pesanan</a></li>
			</ol>
		</nav>
	</div>
</div>

<div class="row">
	<div class="col-lg">
		<h2>Log History Pesanan User : {{ $pesananUser->user->name }}</h2>
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
		<div class="card shadow-md my-4">
			<div class="card-header">Data Pesanan {{ $pesananUser->kode_pemesanan }}</div>
			<div class="card-body">
				<div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <tbody>
                            <tr>
                                <th>Kode Pemesanan</th>
                                <td>:</td>
                                <td>{{ $pesananUser->kode_pemesanan }}</td>
                            </tr>
                            <tr class="user" data-href="{{ route('admin.users.show', $pesananUser->user->id) }}">
                                <th>User Pemesan</th>
                                <td>:</td>
                                <td>{{ $pesananUser->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Total Harga</th>
                                <td>:</td>
                                <td>Rp. {{ number_format($pesananUser->total_harga + $pesananUser->kode_unik) }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Transaksi Dibuat</th>
                                <td>:</td>
                                <td>{{ $pesananUser->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Produk Dibeli</th>
                                <td>:</td>
                                <td>
                                    @foreach ($pesananUser->pesanan_details as $pDetail)
                                    <ul>
                                        <li class="product" data-href="{{ route('admin.products.show', $pDetail->product->id) }}">
                                            {{ $pDetail->product->nama }}
                                            <br>
                                            <img src="{{ $pDetail->product->TakeJerseyImage }}" alt="products" class="img-thumbnail img-fluid" style="max-width: 12rem;">
                                        </li>
                                    </ul>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Status Transaksi</th>
                                <td>:</td>
                                <td>
                                    @if($pesananUser->status == 1)
                                    Belum Lunas atau Menunggu Konfirmasi Admin
                                    @elseif($pesananUser->status == 2)
                                    <p class="badge badge-success p-2">
                                        Pesanan Terkonfirmasi dan Proses Kirim
                                    </p>
                                    @else
                                    <p class="badge badge-success p-2">
                                        Transaksi Selesai
                                    </p>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('admin.logpesanan') }}" class="btn btn-link">Kembali..</a>
                </div>
			</div>
		</div>
	</div>
</div>

@endsection

@include('layouts.partials.modal')

@section('scriptjs')
<script>
    $(document).ready(function() {
        $('.table').on('click', '.product', function(e) {
            e.preventDefault();

            const produk = $(this);
            const url = produk.data('href');

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

        $('.table').on('click', '.user', function(e) {
			e.preventDefault();

			const tombol = $(this);
			const url = tombol.data('href');

			$.ajax({
				url: url,
				dataType: 'html',
				method: 'get',
				success: function(res) {
					$('.modal-body').html(res);
				}
			});

			$('.modal-title').html('Detail User');
			$('.modal #ok').remove();
			$('#componentModal').modal('show');
		});
    });
</script>
@endsection