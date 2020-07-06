

<div class="modal fade" id="ask-login-modal" tabindex="-1" role="dialog">
    <div class="modal-lg modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Anda belum login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Anda harus login terlebih dahulu.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary font-weight-bold" data-dismiss="modal">
                    Batal
                </button>
                <a href="{{ route('login') }}" class="btn btn-primary font-weight-bolder">
                    Lanjut Ke Halaman Login
                </a>
            </div>
        </div>
    </div>
</div>
