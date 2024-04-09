@extends('layouts.app')
@section('title', 'Tambah Data Dukungan')

@section('title-header', 'Tambah Data Dukungan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('supports.index') }}">Data Dukungan</a></li>
    <li class="breadcrumb-item active">Tambah Data Dukungan</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Tambah Data Dukungan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('supports.store') }}" method="POST" role="form"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama_kepala_keluarga">Nama Kepala Keluarga</label>
                                    <input type="text"
                                        class="form-control @error('nama_kepala_keluarga') is-invalid @enderror"
                                        id="nama_kepala_keluarga" placeholder="Nama Kepala Keluarga"
                                        value="{{ old('nama_kepala_keluarga') }}" name="nama_kepala_keluarga">

                                    @error('nama_kepala_keluarga')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="no_telp">No HP</label>
                                    <input type="number" class="form-control @error('no_telp') is-invalid @enderror"
                                        id="no_telp" placeholder="No HP" value="{{ old('no_telp') }}" name="no_telp">

                                    @error('no_telp')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                        id="jenis_kelamin" name="jenis_kelamin">
                                        @php
                                            $genders = ['l', 'p'];
                                        @endphp
                                        <option value="" selected>Pilih Jenis Kelamin</option>
                                        @foreach ($genders as $jenis_kelamin)
                                            <option value="{{ $jenis_kelamin }}"
                                                @if (old('jenis_kelamin') == $jenis_kelamin) selected @endif>
                                                {{ $jenis_kelamin == 'l' ? 'Laki-laki' : 'Perempuan' }}</option>
                                        @endforeach
                                    </select>

                                    @error('jenis_kelamin')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="potensi_suara">Potensi Suara</label>
                                    <input type="number" class="form-control @error('potensi_suara') is-invalid @enderror"
                                        id="potensi_suara" placeholder="Potensi Suara" value="{{ old('potensi_suara') }}"
                                        name="potensi_suara">

                                    @error('potensi_suara')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="long_lat">Titik Koordinat (longitude, langitude)</label>
                                    <input type="text" class="form-control @error('long_lat') is-invalid @enderror"
                                        id="long_lat" placeholder="Titik Koordinat (longitude, langitude)"
                                        value="{{ old('long_lat') }}" name="long_lat">

                                    @error('long_lat')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="foto_tampak_depan_rumah">Foto Tampak Depan Rumah</label>
                                    <input type="file" class="form-control @error('foto_tampak_depan_rumah') is-invalid @enderror"
                                        id="foto_tampak_depan_rumah" placeholder="Foto Tampak Depan Rumah" name="foto_tampak_depan_rumah" required>

                                    @error('foto_tampak_depan_rumah')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror"
                                    id="alamat" placeholder="Alamat" name="alamat" cols="30" rows="5">{{ old('alamat') }}</textarea>

                                    @error('alamat')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{ route('supports.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
