<a href="{{ route('admin.users.show', $row) }}" id="showDetailUser" class="btn btn-success"><i class="fas fa-user"></i> Detail</a>
<a href="{{ route('admin.users.edit', $row) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
<form action="{{ route('admin.users.delete', $row->id) }}" method="post" class="d-inline">
	@csrf
	@method('delete')
	<button class="btn btn-danger text-white" onclick="return confirm('Are you ready to delete this data?');">
		<i class="fas fa-trash"></i> Hapus
	</button>
</form>