<a href="{{ route($r.'.edit', $id) }}" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit text-white"></i></a>
<form action="{{ route($r.'.destroy', $id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
    @csrf @method('DELETE')<button class="btn btn-danger btn-sm" title="Hapus"><i class="fas fa-trash"></i></button>
</form>
