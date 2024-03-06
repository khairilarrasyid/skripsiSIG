<div class="modal fade bd-example-modal-lg" id="gallery-modal">
    <div class="modal-dialog  modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4">Form Upload Foto Galeri</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">


                        <form id="create-upload" action="{{ route('gallerys.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Upload Foto</label>
                                <input type="file" class="form-control @error('upload') is-invalid @enderror" id="upload" name="upload" required
                                    accept="image/*">
                                <input type="hidden" name="destination_id" id="destination_id">
                                <small class="text-danger">*Ukuran gambar maksimal 2 MB</small>
                                @error('upload')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>

                        <div class="row mt-5">
                            <div class="col-md-12">
                                <div class="gallery-modal-detail"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
