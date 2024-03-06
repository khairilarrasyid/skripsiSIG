<div class="modal fade" id="create-new-project">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Buat Kategori</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf

                <div class="modal-body">
                    <div class="form-group">
                        <label for="new-project-name">Nama Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="name"
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="alert alert-warning" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
