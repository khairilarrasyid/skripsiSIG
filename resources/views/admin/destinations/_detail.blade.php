<h2 class="font-weight-normal m-b-10">{{ $destination->name }}</h2>
<div class="d-flex m-b-30">
    <div class="">
        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">{{ $destination->user->name }}</a>
        <p class="m-b-0 text-muted font-size-13">{{ date('F j, Y', strtotime($destination->created_at)) }}</p>
    </div>
</div>
<img alt="" class="img-fluid w-100" src="{{ Storage::url('destinations/' . $destination->image) }}">
<div class="m-t-30">
    <p class="m-b-10">{!! $destination->description !!}</p>
</div>
<div class="m-t-30">
    <h4 class="m-b-20">Informasi Tambahan</h4>
    <div class="table-responsive">
        <table class="product-info-table">
            <tbody>
                <tr>
                    <td>Kategori:</td>
                    <td>{{ $destination->category->name }}</td>
                </tr>
                <tr>
                    <td>Harga Tiket Masuk:</td>
                    <td>Rp. {{ number_format($destination->price) }}</td>
                </tr>
                <tr>
                    <td>Jam Operasional:</td>
                    <td>{{ $destination->opening_hours }}</td>
                </tr>
                <tr>
                    <td>Alamat:</td>
                    <td>{{ $destination->address }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="m-t-30">
    <h4 class="m-b-20">Galeri</h4>
    <div class="row">

        @foreach ($destination->galleries as $gallery)
        <div class="col-md-3">
            <img class="img-fluid" src="{{ Storage::url('gallery/' . $gallery->image) }}" alt="">
        </div>
        @endforeach
    </div>
</div>
