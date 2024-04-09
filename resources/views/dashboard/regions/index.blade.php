@extends('layouts.app')
@section('title', 'Data Wilayah')

@section('title-header', 'Data Wilayah')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Data Wilayah</li>
@endsection

@section('action_btn')
    <a href="{{ route('regions.create') }}" class="btn btn-default">Tambah Data</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Data Wilayah</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama wilayah</th>
                                    <th>Nama Mentor Penggerak</th>
                                    <th>Nama Operator Wilayah</th>
                                    <th>Status</th>
                                    <th>Jumlah Pengambilan Suara Tahun 2014</th>
                                    <th>Jumlah Pengambilan Suara Tahun 2019</th>
                                    <th>Target Rumah</th>
                                    <th>Progres</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($regions as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->nama_wilayah }}</td>
                                        <td>{{ $user->mentor?->name ?? "Belum ada." }}</td>
                                        <td>{{ $user->operator?->name ?? "Belum ada." }}</td>
                                        <td>{{ $user->status_wilayah ?? "-" }}</td>
                                        <td>{{ $user->vote_2014 }}</td>
                                        <td>{{ $user->vote_2019 }}</td>
                                        <td>{{ $user->target_rumah }}</td>
                                        <td>{{ $user->progres_label }}</td>
                                        <td class="d-flex jutify-content-center">
                                            <a href="{{ route('regions.edit', $user->id) }}"
                                                class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <form id="delete-form-{{ $user->id }}"
                                                action="{{ route('regions.destroy', $user->id) }}" class="d-none"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{ $user->id }}')"
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
