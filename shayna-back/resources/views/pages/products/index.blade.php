@extends('layouts.default')

@section('main')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="box-title">
                            <h4>Daftar Barang</h4>
                        </div>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Barang</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($products as $p)
                                    <tr>
                                        <td>{{ $p->id }}</td>
                                        <td>{{ $p->nama_barang }}</td>
                                        <td>{{ $p->kategori }}</td>
                                        <td>{{ $p->harga }}</td>
                                        <td>{{ $p->stok }} pcs</td>
                                        <td>
                                            <a href="{{ route('products.gallery', $p->id) }}">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-picture-o"></i>
                                                </button>
                                            </a>

                                            <a href="{{ route('products.edit', $p->id) }}">
                                                <button class="btn btn-warning btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                            </a>

                                            <form method="post" action="{{ route('products.destroy', $p->id) }}" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                                    @empty
                                    <tr>
                                        <td class="text-center" colspan="6">Data Tidak Tersedia</td>
                                    </tr>
                                    @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection