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
      <td>{{ $user->name }}</td>
    </tr>
    <tr>
      <th scope="row">Role</th>
      <td>{{ $user->role }}</td>
    </tr>
    <tr>
      <th scope="row">Email</th>
      <td>{{ $user->email }}</td>
    </tr>
    <tr>
      <th scope="row">Alamat</th>
      <td>{{ $user->alamat }}</td>
    </tr>
    <tr>
      <th scope="row">No HP</th>
      <td>{{ $user->no_hp }}</td>
    </tr>
    <tr>
      <th scope="row">Daftar</th>
      <td>
        {{ $user->created_at->diffForHumans() }},
        {{ $user->created_at }}
      </td>
    </tr>
    <tr>
      <th scope="row">Terakhir Edit Profile</th>
      <td>
        {{ $user->updated_at->diffForHumans() }},
        {{ $user->updated_at }}
      </td>
    </tr>
  </tbody>
</table>