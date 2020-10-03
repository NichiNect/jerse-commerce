<div class="row">
	<div class="col-md-4">
		<img src="{{ $product->TakeJerseyImage }}" class="card-img-top">
	</div>
	<div class="col-md-8">
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">Keterangan</th>
					<th scope="col">Data</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">Nama</th>
					<td>{{ $product->nama }}</td>
				</tr>
				<tr>
					<th scope="row">Harga</th>
					<td>
						{{ $product->harga }}
					</td>
				</tr>
				<tr>
					<th scope="row">Harga Nameset</th>
					<td>
						{{ $product->harga_nameset }}
					</td>
				</tr>
				<tr>
					<th scope="row">Status</th>
					<td>

						@if($product->is_ready === 1)
						<span class="badge badge-success">Ready</span>
						@elseif($product->is_ready === 0)
						<span class="badge badge-danger">Stok Habis</span>
						@endif
					</td>
				</tr>
				<tr>
					<th scope="row">Jenis</th>
					<td>
						{{ $product->jenis }}
					</td>
				</tr>
				<tr>
					<th scope="row">Berat</th>
					<td>
						{{ $product->berat }}
					</td>
				</tr>
				<tr>
					<th scope="row">Liga</th>
					<td>
						{{ $product->liga->nama }}
					</td>
				</tr>
				<tr>
					<th scope="row">Last Updated</th>
					<td>
						@if($product->updated_at == null)
						<small class="text-muted"><i>Last Update : -</i></small>
						@else
						<small class="text-muted"><i>Last Update : {{ $product->updated_at->diffForHumans() }}, {{ $product->updated_at }}</i></small>
						@endif
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>