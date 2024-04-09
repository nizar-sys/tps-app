@extends('layouts.app')
@section('title', 'Edit Data Barang')

@section('title-header', 'Edit Data Barang')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('logistics.index') }}">Data Barang</a></li>
    <li class="breadcrumb-item active">Edit Data Barang</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Edit Data Barang</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('logistics.update', $logistic->id) }}" method="POST" role="form"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                                        id="nama_barang" placeholder="Nama Barang"
                                        value="{{ old('nama_barang', $logistic->nama_barang) }}" name="nama_barang">

                                    @error('nama_barang')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="kategori_barang">Kategori Barang</label>
                                    <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                                        name="category_id">
                                        <option selected>Pilih Kategori</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if (old('category_id', $logistic->category_id) == $category->id) selected @endif>
                                                {{ $category->nama_kategori }}</option>
                                        @endforeach
                                    </select>

                                    @error('kategori_barang')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="stok_barang">Stok Barang</label>
                                    <input type="number" class="form-control @error('stok_barang') is-invalid @enderror"
                                        id="stok_barang" placeholder="Stok Barang"
                                        value="{{ old('stok_barang', $logistic->stok_barang) }}" name="stok_barang">

                                    @error('stok_barang')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{ route('logistics.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
