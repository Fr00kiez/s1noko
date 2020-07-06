<form action="{{ route('admin.posts.destroy', $id) }}" method="POST">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-outline-danger font-weight-bold">DELETE</button>
</form>
