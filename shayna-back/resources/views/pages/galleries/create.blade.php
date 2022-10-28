@extends('layouts.default')

@section('main')
	<div class="card">
		<div class="card-header">
			<strong>Tambah Foto Barang</strong>
		</div>
		<div class="card-body card-block">
			<form action="{{ route('galleries.store') }}" method="post" enctype="multipart/form-data">
				@csrf

				<div class="form-group">
					<label for="nama">Nama Barang</label>
					<select class="form-control @error('nama') is-invalid {{ $message }} @enderror" id="nama" name="idproduk">
						<option disabled selected>Pilih Nama Barang</option>
						@foreach($idbarang as $i)
							<option value="{{ $i->id }}">{{ $i->nama_barang }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="foto">Foto</label>
					<input type="file" name="foto" class="form-control @error('foto') is-invalid {{ $message }} @enderror" value="{{ old('foto') }}" accept="image/*">
				</div>

				<div class="form-group">
					<label>Jadikan Default</label>
					<br>

					<div class="form-control">
						<input type="radio" value="1" name="is_default" id="default">
						<label for="default" class="@error('is_default') is-invalid {{ $message }} @enderror">Boleh</label>
						&nbsp
						<input type="radio" value="0" name="is_default" id="default!">
						<label for="default!" class="@error('is_default') is-invalid {{ $message }} @enderror">Gamau ah</label>
					</div>
					

				</div>

				<div class="form-group">
					<button class="btn btn-primary btn-block" type="submit">Tambahkan Barang</button>
				</div>
			</form>
		</div>
	</div>
@endsection