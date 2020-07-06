<div class="modal fade" id="create-post-modal" tabindex="-1" role="dialog">
    <form action="{{ route('posts.store') }}" method="POST" class="modal-lg modal-dialog" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Unggah Karya</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="w-100">
                    <tr>
                        <td class="px-2 py-2" style="vertical-align: top;">
                            <label for="upload-title" class="mb-0 pt-2">Judul</label>
                        </td>
                        <td class="px-2 py-2" style="vertical-align: top;">
                            <input type="text" class="form-control" id="upload-title" name="title"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-2 py-2" style="vertical-align: top;">
                            <label for="upload-description" class="mb-0 pt-2">Deskripsi</label>
                        </td>
                        <td class="px-2 py-2" style="vertical-align: top;">
                                <textarea class="form-control" id="upload-description" name="description"
                                          rows="5"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-2 py-2" style="vertical-align: top;">
                            <label for="upload-picture" class="mb-0 pt-2">Karya</label>
                        </td>
                        <td class="px-2 py-2" style="vertical-align: top;">
                            <input type="file" class="form-control" id="upload-picture" name="picture"/>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary font-weight-bold" data-dismiss="modal">
                    Batal
                </button>
                <button type="submit" class="btn btn-primary font-weight-bolder">
                    Unggah Karya
                </button>
            </div>
        </div>
    </form>
</div>
