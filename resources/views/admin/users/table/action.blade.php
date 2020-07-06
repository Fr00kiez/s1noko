<form action="{{ route('admin.users.destroy', $id) }}" method="POST">
    @csrf
    @method('DELETE')

    <a href="{{ route('admin.users.edit', $id) }}" class="btn btn-outline-secondary font-weight-bold mr-2">EDIT</a>

    <button type="submit" class="btn btn-outline-danger font-weight-bold">DELETE</button>
</form>
