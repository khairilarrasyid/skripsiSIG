<div class="modal fade bd-example-modal-sm" id="delete-form-modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="text-center text-danger" style="text-align: center;font-size: 25px;">Apakah anda yakin?</h4>
                <br>
                <p class="text-muted text-center">Apakah Anda benar-benar ingin menghapus data ini? Data yang telah di hapus tidak dapat dikembalikan.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Batal</button>
                <a href="#" class="btn btn-danger btn-block" onclick="event.preventDefault();
                document.getElementById('delete-form').submit();">Hapus</a>

                <form action="" method="POST" class="d-none" id="delete-form">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
</div>