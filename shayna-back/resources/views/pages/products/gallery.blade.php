@extends('layouts.default')

@section('main')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="box-title">
                            <h4>Daftar Foto {{ $data->nama_barang }}</h4>
                        </div>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Barang</th>
                                        <th>Foto</th>
                                        <th>Default</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($barang as $p)
                                    <tr>
                                        <td>{{ $p->id }}</td>
                                        <td>{{ $p->product->nama_barang }}</td>
                                        <td>
                                            <img src="{{ Storage::url($p->foto) }}">
                                        </td>
                                        <td>{{ $p->is_default? 'ya' : 'tidak' }}</td>
                                        <td>
                                            <form method="post" action="{{ route('galleries.destroy', $p->id) }}" class="d-inline">
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