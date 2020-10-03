<a href="{{ route('admin.products.show', $row) }}" id="showDetailProduct" class="btn btn-success btn-sm mt-2"><i class="fas fa-tshirt"></i> Detail</a>
<a href="{{ route('admin.products.edit', $row) }}" class="btn btn-warning btn-sm mt-2"><i class="fas fa-edit"></i> Edit</a>
<form action="" method="post" class="d-inline">
	@csrf
	@method('delete')
	<button class="btn btn-danger btn-sm mt-2 text-white" onclick="return confirm('Are you ready to delete this data?');">
		<i class="fas fa-trash"></i> Hapus
	</button>
</form>