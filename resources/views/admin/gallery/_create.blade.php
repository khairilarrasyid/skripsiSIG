<div class="modal fade" id="create-new-project">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Upload Foto</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <form action="{{ route('gallerys.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Pilih Destinasi</label>
                        <select name="destination_id" id="destination_id" class="form-control">
                            <option value="">Pilih Destinasi</option>
                            @foreach ($destinations as $destination)
                                <option {{ old('destination_id') == $destination->id ? 'selected' : '' }} value="{{ $destination->id }}">{{ $destination->name }}</option>
                            @endforeach
                        </select>
                        @error('destination_id')
                            <div class="alert alert-warning" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Upload Foto</label>
                        <input type="file" class="form-control @error('upload') is-invalid @enderror" id="upload" name="upload" required
                            accept="image/*">
                        <small class="text-danger">*Ukuran gambar maksimal 2 MB</small>
                        @error('upload')
                            <div class="invalid-feedback">
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
