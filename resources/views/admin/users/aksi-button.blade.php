<a href="#" class="btn btn-success"><i class="fas fa-user"></i> Detail</a>
<a href="#" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
<form action="#" method="post" class="d-inline">
	@csrf
	@method('delete')
	<button class="btn btn-danger text-white" onclick="return confirm('Are you ready to delete this data?');">
		<i class="fas fa-trash"></i> Hapus
	</button>
</form>