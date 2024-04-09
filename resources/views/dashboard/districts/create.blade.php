@extends('layouts.app')
@section('title', 'Tambah Data Kecamatan')

@section('title-header', 'Tambah Data Kecamatan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('districts.index') }}">Data Kecamatan</a></li>
    <li class="breadcrumb-item active">Tambah Data Kecamatan</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Tambah Data Kecamatan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('districts.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="region_id">Nama Wilayah</label>
                                    <select class="form-control @error('region_id') is-invalid @enderror" id="region_id"
                                        name="region_id">
                                        <option value="" selected>Pilih Nama Wilayah</option>
                                        @foreach ($regions as $region)
                                            <option value="{{ $region->id }}"
                                                @if (old('region_id') == $region->id) selected @endif>
                                                {{ $region->nama_wilayah }}</option>
                                        @endforeach
                                    </select>
                                    @error('region_id')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="nama_kecamatan">Nama Kecamatan</label>
                                    <input type="text" class="form-control @error('nama_kecamatan') is-invalid @enderror"
                                        id="nama_kecamatan" placeholder="Nama Kecamatan" value="{{ old('nama_kecamatan') }}"
                                        name="nama_kecamatan">

                                    @error('nama_kecamatan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="mentor_id">Nama Mentor Kecamatan</label>
                                    <select class="form-control @error('mentor_id') is-invalid @enderror" id="mentor_id"
                                        name="mentor_id">
                                        <option value="" selected>Pilih Nama Mentor Kecamatan</option>
                                        @foreach ($mentors as $mentor)
                                            <option value="{{ $mentor->id }}"
                                                @if (old('mentor_id') == $mentor->id) selected @endif>
                                                {{ $mentor->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('mentor_id')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{ route('districts.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
