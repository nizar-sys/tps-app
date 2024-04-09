@extends('layouts.app')
@section('title', 'Ubah Data Wilayah')

@section('title-header', 'Ubah Data Wilayah')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('regions.index') }}">Data Wilayah</a></li>
    <li class="breadcrumb-item active">Ubah Data Wilayah</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Ubah Data Wilayah</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('regions.update', $region->id) }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="nama_wilayah">Nama Wilayah</label>
                                    <input type="text" class="form-control @error('nama_wilayah') is-invalid @enderror"
                                        id="nama_wilayah" placeholder="Nama Wilayah" value="{{ old('nama_wilayah', $region->nama_wilayah) }}"
                                        name="nama_wilayah">

                                    @error('nama_wilayah')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="mentor_id">Nama Mentor Penggerak</label>
                                    <select class="form-control @error('mentor_id') is-invalid @enderror" id="mentor_id"
                                        name="mentor_id">
                                        <option value="" selected>Pilih Nama Mentor Penggerak</option>
                                        @foreach ($mentors as $mentor)
                                            <option value="{{ $mentor->id }}"
                                                @if (old('mentor_id', $region->mentor_id) == $mentor->id) selected @endif>
                                                {{ $mentor->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('mentor_id')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="operator_id">Nama Operator Wilayah</label>
                                    <select class="form-control @error('operator_id') is-invalid @enderror" id="operator_id"
                                        name="operator_id">
                                        <option value="" selected>Pilih Nama Operator Wilayah</option>
                                        @foreach ($operators as $operator)
                                            <option value="{{ $operator->id }}"
                                                @if (old('operator_id', $region->operator_id) == $operator->id) selected @endif>
                                                {{ $operator->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('operator_id')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{ route('regions.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
