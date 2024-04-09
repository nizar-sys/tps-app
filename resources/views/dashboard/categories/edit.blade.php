@extends('layouts.app')
@section('title', 'Edit Data Kategori')

@section('title-header', 'Edit Data Kategori')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Data Kategori</a></li>
    <li class="breadcrumb-item active">Edit Data Kategori</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Edit Data Kategori</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.update', $categories->id) }}" method="POST" role="form"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="nama_kategori">Nama Kategori</label>
                                    <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror"
                                        id="nama_kategori" placeholder="Nama Kategori"
                                        value="{{ old('nama_kategori', $categories->nama_kategori) }}" name="nama_kategori">

                                    @error('nama_kategori')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{ route('categories.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
