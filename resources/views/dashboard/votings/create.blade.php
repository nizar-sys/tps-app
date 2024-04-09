@extends('layouts.app')
@section('title', 'Tambah Data TPS')

@section('title-header', 'Tambah Data TPS')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('votings.index') }}">Data TPS</a></li>
    <li class="breadcrumb-item active">Tambah Data TPS</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Tambah Data TPS</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('votings.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="village_id">Nama Desa</label>
                                    <select class="form-control @error('village_id') is-invalid @enderror" id="village_id"
                                        name="village_id">
                                        <option value="" selected>Pilih Nama Desa</option>
                                        @foreach ($villages as $village)
                                            <option value="{{ $village->id }}"
                                                @if (old('village_id') == $village->id) selected @endif>
                                                {{ $village->nama_desa }}</option>
                                        @endforeach
                                    </select>
                                    @error('village_id')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="nama_tps">Nama TPS</label>
                                    <input type="text" class="form-control @error('nama_tps') is-invalid @enderror"
                                        id="nama_tps" placeholder="Nama TPS" value="{{ old('nama_tps') }}"
                                        name="nama_tps">

                                    @error('nama_tps')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                    <label for="tim_id">Nama Tim TPS</label>
                                    <select class="form-control @error('tim_id') is-invalid @enderror" id="tim_id"
                                        name="tim_id">
                                        <option value="" selected>Pilih Nama Tim TPS</option>
                                        @foreach ($oneTimVoting as $oneTime)
                                            <option value="{{ $oneTime->id }}"
                                                @if (old('tim_id') == $oneTime->id) selected @endif>
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
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{ route('votings.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
