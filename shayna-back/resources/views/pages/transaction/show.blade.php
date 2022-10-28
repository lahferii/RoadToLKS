<table class="table table-bordered">
    <tr>
        <tr>
            <th>Nama</th>
            <td>{{ $data->nama }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $data->email }}</td>
        </tr>
        <tr>
            <th>Nomor Telpon</th>
            <td>{{ $data->telpon }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $data->alamat }}</td>
        </tr>
        <tr>
            <th>Total Transaksi</th>
            <td>{{ $data->total }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $data->status }}</td>
        </tr>
        <tr>
            <th>Pembelian Produk</th>
            <td>
                <table class="table table-bordered w-100">
                    <tr>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                    </tr>
                    @foreach ($data->details as $barang)
                        <tr>
                            <td>{{ $barang->products->nama_barang }}</td>
                            <td>{{ $barang->products->kategori }}</td>
                            <td>Rp.{{ $barang->products->harga }}</td>
                        </tr>
                    @endforeach
                </table>
            </td>
        </tr>
    </tr>
</table>

<div class="row">
    <div class="col-4">
        <a href="{{ route('transactions.status', $data->id) }}?status=SUCCESS" class="btn btn-success btn-block">
            <i class="fa fa-check"></i>
            Set Sukses
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transactions.status', $data->id) }}?status=FAILED" class="btn btn-danger btn-block">
            <i class="fa fa-times"></i>
            Set Gagal
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transactions.status', $data->id) }}?status=PENDING" class="btn btn-info btn-block">
            <i class="fa fa-spinner"></i>
            Set Pending
        </a>
    </div>
</div>