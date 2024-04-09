@extends('layouts.app')
@section('title', 'Data Dukungan')

@section('title-header', 'Data Dukungan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Data Dukungan</li>
@endsection

@section('action_btn')
    <a href="{{route('supports.create')}}" class="btn btn-default">Tambah Data</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Data Dukungan</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kepala Keluarga</th>
                                    <th>No Telp</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Potensi Suara</th>
                                    <th>Titik Koordinasi</th>
                                    <th>Foto Tampak Depan Rumah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($supports as $support)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $support->nama_kepala_keluarga }}</td>
                                        <td>{{ $support->no_telp }}</td>
                                        <td>{{ $support->jenis_kelamin_label }}</td>
                                        <td>{{ $support->alamat }}</td>
                                        <td>{{ $support->potensi_suara }}</td>
                                        <td>{{ $support->long_lat }}</td>
                                        <td>
                                            <img src="{{ $support->foto_tampak_depan_rumah }}" alt="{{ $support->nama_kepala_keluarga }}" width="100" class="img-fluid">
                                        </td>
                                        <td class="d-flex jutify-content-center">
                                            <a href="{{route('supports.edit', $support->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <form id="delete-form-{{ $support->id }}" action="{{ route('supports.destroy', $support->id) }}" class="d-none" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{$support->id}}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4">
                                        {{ $supports->links() }}
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function deleteForm(id){
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
