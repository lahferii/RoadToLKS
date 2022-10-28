@extends('layouts.default')

@section('main')
	<div class="card">
		<div class="card-header">
			<strong>Tambah Barang</strong>
		</div>
		<div class="card-body card-block">
			<form action="{{ route('products.store') }}" method="post">
				@csrf
				<div class="form-group">
					<label class="from-control-label" for="nama_barang">Nama Barang</label>
					<input type="text" value="{{ old('nama_barang') }}" id="nama_barang" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror">
					@error('nama_barang') <div class="text-muted">{{ $message }}</div> @enderror
				</div>

				<div class="form-group">
					<label class="from-control-label" for="kategori">Kategori Barang</label>
					<input type="text" value="{{ old('kategori') }}" name="kategori" class="form-control @error('kategori') is-invalid @enderror">
					@error('kategori') <div class="text-muted">{{ $message }}</div> @enderror
				</div>

				<div class="form-group">
					<label class="from-control-label" for="harga">Harga Barang</label>
					<input type="number" value="{{ old('harga') }}" name="harga" class="form-control @error('harga') is-invalid @enderror">
					@error('harga') <div class="text-muted">{{ $message }}</div> @enderror
				</div>

				<div class="form-group">
					<label class="from-control-label" for="stok">Jumlah Barang</label>
					<input type="number" value="{{ old('stok') }}" name="stok" class="form-control @error('stok') is-invalid @enderror">
					@error('stok') <div class="text-muted">{{ $message }}</div> @enderror
				</div>

				<div class="form-group">
					<label class="from-control-label" for="deskripsi">Deskripsi Barang</label>
					<textarea value="{{ old('desc') }}" name="desc" class="form-control @error('desc') is-invalid @enderror"></textarea>
					@error('deskripsi') <div class="text-muted">{{ $message }}</div> @enderror
				</div>

				<div class="form-group">
					<button class="btn btn-primary btn-block" type="submit">Tambahkan Barang</button>
				</div>
			</form>
		</div>
	</div>
@endsection