@extends('layouts.app')
@section('title', 'Ubah Data Desa')

@section('title-header', 'Ubah Data Desa')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('villages.index') }}">Data Desa</a></li>
    <li class="breadcrumb-item active">Ubah Data Desa</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Ubah Data Desa</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('villages.update', $village->id) }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="district_id">Nama Kecamatan</label>
                                    <select class="form-control @error('district_id') is-invalid @enderror" id="district_id"
                                        name="district_id">
                                        <option value="" selected>Pilih Nama Kecamatan</option>
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}"
                                                @if (old('district_id', $village->district_id) == $district->id) selected @endif>
                                                {{ $district->nama_kecamatan }}</option>
                                        @endforeach
                                    </select>
                                    @error('district_id')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="nama_desa">Nama Desa</label>
                                    <input type="text" class="form-control @error('nama_desa') is-invalid @enderror"
                                        id="nama_desa" placeholder="Nama Desa" value="{{ old('nama_desa', $village->nama_desa) }}"
                                        name="nama_desa">

                                    @error('nama_desa')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="tim_id">Nama Tim Desa</label>
                                    <select class="form-control @error('tim_id') is-invalid @enderror" id="tim_id"
                                        name="tim_id">
                                        <option value="" selected>Pilih Nama Tim Desa</option>
                                        @foreach ($oneTimVillage as $oneTime)
                                            <option value="{{ $oneTime->id }}"
                                                @if (old('tim_id', $village->tim_id) == $oneTime->id) selected @endif>
                                                {{ $oneTime->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tim_id')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{ route('villages.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
