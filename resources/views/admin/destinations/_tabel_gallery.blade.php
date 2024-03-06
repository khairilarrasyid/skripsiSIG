<table class="table table-bordered">
    <thead>
        <tr>
            <th>Foto</th>
            <th width="15%">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($destination->galleries as $gallery)
            <tr>
                <td>
                    <img src="{{ Storage::url('gallery/' . $gallery->image) }}" alt="" class="img-fluid w-100">
                </td>
                <td>
                    <form action="{{ route('gallerys.destroy', $gallery->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-icon btn-hover btn-sm btn-rounded">
                            <i class="anticon anticon-delete"></i>
                        </button>
                    </form>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>