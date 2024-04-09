@extends('layouts.app')
@section('title', 'Data Desa')

@section('title-header', 'Data Desa')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Data Desa</li>
@endsection

@section('action_btn')
    <a href="{{ route('villages.create') }}" class="btn btn-default">Tambah Data</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Data Desa</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kecamatan</th>
                                    <th>Nama Desa</th>
                                    <th>Nama Tim Desa</th>
                                    <th>Status</th>
                                    <th>Jumlah Pengambilan Suara Tahun 2014</th>
                                    <th>Jumlah Pengambilan Suara Tahun 2019</th>
                                    <th>Target Rumah</th>
                                    <th>Progres</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($villages as $village)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $village->district->nama_kecamatan }}</td>
                                        <td>{{ $village->nama_desa }}</td>
                                        <td>{{ $village->tim?->name ?? "Belum ada." }}</td>
                                        <td>{{ $village->status_desa ?? "-" }}</td>
                                        <td>{{ $village->vote_2014 }}</td>
                                        <td>{{ $village->vote_2019 }}</td>
                                        <td>{{ $village->target_rumah }}</td>
                                        <td>{{ $village->progres_label }}</td>
                                        <td class="d-flex jutify-content-center">
                                            <a href="{{ route('villages.edit', $village->id) }}"
                                                class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <form id="delete-form-{{ $village->id }}"
                                                action="{{ route('villages.destroy', $village->id) }}" class="d-none"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{ $village->id }}')"
                                                class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function deleteForm(id) {
            Swal.fire({
                title: 'Hapus data',
                text: "Anda akan menghapus data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(`#delete-form-${id}`).submit()
                }
            })
        }
    </script>
@endsection
