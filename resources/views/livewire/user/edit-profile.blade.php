<div>
	<form wire:submit.prevent="updateUser" method="post">
		@csrf
		<div class="form-group">
			<label for="nama">Nama</label>
			<input wire:model="nama" type="text" class="form-control @error('nama') is_invalid @enderror" id="nama" placeholder="Masukkan nama.." value="{{ $dataUser->name }}">
			@error('name')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" class="form-control" id="email" placeholder="Masukkan email.." value="{{ $dataUser->email }}" readonly>
		</div>
		<div class="form-group">
			<label for="alamat">Alamat</label>
			<textarea wire:model="alamat" id="alamat" rows="3" class="form-control @error('alamat') is_invalid @enderror" placeholder="Masukkan alamat..">{{ $dataUser->alamat }}</textarea>
			@error('alamat')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
		<div class="form-group">
			<label for="no_hp">No HP</label>
			<input wire:model="no_hp" type="text" class="form-control @error('no_hp') is_invalid @enderror" id="no_hp" placeholder="Masukkan nomer hp.." value="{{ $dataUser->no_hp }}">
			@error('no_hp')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
