@extends('layouts.default')

@section('main')
	<div class="card">
		<div class="card-header">
			<strong>Ubah Data {{ $data->uuid }}</strong>
		</div>
		<div class="card-body card-block">
			<form action="{{ route('transactions.update', $data->id) }}" method="POST">
                @method('put')
                @csrf

                <div class="form-group">
                    <label for="nama">Nama Pembeli</label>
                    <input type="text" name="nama" value="{{ $data->nama }}" id="nama" class="form-control @error('nama') is-invalid @enderror">
                    @error('nama') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email Pembeli</label>
                    <input type="email" value="{{ $data->email }}" name="email" id="email" class="form-control @error('email') is-invalid @enderror">
                    @error('email') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="telpon">Telpon Pembeli</label>
                    <input type="text" name="telpon" id="telpon" value="{{ $data->telpon }}" class="form-control @error('telpon') is-invalid @enderror">
                    @error('telpon') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat Pembeli</label>
                    <input type="text" name="alamat" id="alamat" value="{{ $data->alamat }}" class="form-control @error('alamat') is-invalid @enderror">
                    @error('alamat') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <button class="btn btn-primary col-12">Ubah Transaksi</button>
                </div>
            </form>
		</div>
	</div>
@endsection