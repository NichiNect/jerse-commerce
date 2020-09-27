<div class="row">
	<div class="col-lg-8">
		<div class="card mt-3">
			<div class="card-header">
				Form Ganti Password
			</div>
			<div class="card-body">
				<p class="card-text text-muted">
					<b>Isikan form dibawah ini dengan benar sebagai syarat untuk mengganti password akun!</b>
					<br>
					<small>
						<i>Last updated : {{ $user->updated_at->diffForHumans() }}, {{ $user->updated_at }}</i>
					</small>
				</p>
				<form action="{{ route('admin.users.putchangepassword', $user) }}" method="post" class="mt-3">
					@csrf
					@method('put')
					<div class="form-group">
						<label for="password_lama">Password Lama</label>
						<input type="password" name="password_lama" class="form-control" id="password_lama" placeholder="Masukkan password lama..">
						@error('password_lama')
						<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group">
						<label for="new_password">Password Baru</label>
						<input type="password" name="new_password" class="form-control" id="new_password" placeholder="Masukkan password baru..">
						@error('new_password')
						<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group">
						<label for="repeat_password">Ulangi Password Baru</label>
						<input type="password" name="repeat_password" class="form-control" id="repeat_password" placeholder="Masukkan password baru sesuai field diatas..">
						@error('repeat_password')
						<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group text-right">
						<button type="submit" class="btn btn-outline-success">Change Password!</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>