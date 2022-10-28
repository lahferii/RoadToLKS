@extends('layouts.default')

@section('main')
<div class="orders">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="box-title">
                        <h4>Daftar Transaksi</h4>
                    </div>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telpon</th>
                                    <th>Alamat</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($item as $p)
                                <tr>
                                    <td>{{ $p->id }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->email }}</td>
                                    <td>{{ $p->telpon }}</td>
                                    <td>{{ $p->alamat }}</td>
                                    <td>Rp.{{ $p->total }}.000</td>
                                    <td>
                                        @if($p->status == "PENDING")
                                            <span class="badge badge-info">
                                        @elseif($p->status == "SUCCESS")
                                            <span class="badge badge-success">
                                        @elseif($p->status == "FAILED")
                                            <span class="badge badge-danger">
                                        @endif
                                                {{ $p->status }}
                                            </span>
                                    </td>
                                    <td>
                                        {{-- <a href="{{ route('transactions.status', $p->id) }}?status=SUCCESS">
                                            <button class="btn btn-success btn-sm">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('transactions.status', $p->id) }}?status=FAILED">
                                            <button class="btn btn-success btn-sm">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </a> --}}

                                        <a href="#modal"
                                           data-remote="{{ route('transactions.show', $p->id) }}" 
                                           data-toggle="modal"
                                           data-target="#modal" 
                                           data-title="Detail Transaksi {{ $p->uuid }}"
                                           class="btn btn-sm btn-info">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        
                                        <a href="{{ route('transactions.edit', $p->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form method="post" action="{{ route('transactions.destroy', $p->id) }}" class="d-inline">
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
                                    <td class="text-center" colspan="8">Data Tidak Tersedia</td>
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