@extends('layouts.app')
@section('title', 'Data Barang')

@section('title-header', 'Data Barang')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Data Barang</li>
@endsection

@section('action_btn')
    <a href="{{ route('logistics.create') }}" class="btn btn-default">Tambah Data</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Data Barang</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori Barang</th>
                                    <th>Stok Barang</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($logistics as $logistic)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $logistic->nama_barang }}</td>
                                        <td>{{ $logistic->category->nama_kategori }}</td>
                                        <td>{{ $logistic->stok_barang }}</td>
                                        <td class="d-flex jutify-content-center">
                                            <a href="{{ route('logistics.edit', $logistic->id) }}"
                                                class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <form id="delete-form-{{ $logistic->id }}"
                                                action="{{ route('logistics.destroy', $logistic->id) }}" class="d-none"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{ $logistic->id }}')"
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
