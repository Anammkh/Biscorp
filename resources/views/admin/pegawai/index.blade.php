@extends('template.admin')

@section('title', 'Pegawai')

@section('content')
    <section class="section">
        <div class="card shadow-lg">
            <div class="card-header">
                <h5 class="card-title">Data Pegawai</h5>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Pegawai</button>
            </div>
            <div class="card-body">
                <div class="table-responsive datatable-minimal">
                    <table class="table" id="table2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Gambar</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pegawai as $pegawaiItem)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pegawaiItem->nama }}</td>
                                    <td>
                                        @if ($pegawaiItem->gambar)
                                            <img src="{{ asset('storage/' . $pegawaiItem->gambar) }}"
                                                alt="{{ $pegawaiItem->nama }}"
                                                style="width: 50px; height: 50px; object-fit: cover;">
                                        @endif
                                    </td>
                                    <td>{{ $pegawaiItem->email }}</td>
                                    <td>{{ $pegawaiItem->alamat }}</td>
                                    <td>{{ $pegawaiItem->jabatan->nama }}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $pegawaiItem->id }}">Edit</button>
                                        <form id="deleteForm" action="{{ route('pegawai.destroy', $pegawaiItem->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm"
                                                onclick="showDeleteConfirmation()">Hapus</button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Modal Edit Pegawai -->
                                <div class="modal fade" id="editModal{{ $pegawaiItem->id }}" tabindex="-1"
                                    aria-labelledby="editModalLabel{{ $pegawaiItem->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel{{ $pegawaiItem->id }}">Edit
                                                    Pegawai</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('pegawai.update', $pegawaiItem->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="nama{{ $pegawaiItem->id }}"
                                                                class="form-label">Nama</label>
                                                            <input type="text" id="nama{{ $pegawaiItem->id }}"
                                                                name="nama" class="form-control"
                                                                value="{{ $pegawaiItem->nama }}" required>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="gambar{{ $pegawaiItem->id }}"
                                                                class="form-label">Gambar</label>
                                                            <input type="file" id="gambar{{ $pegawaiItem->id }}"
                                                                name="gambar" class="form-control">
                                                            @if ($pegawaiItem->gambar)
                                                                <img src="{{ asset('storage/' . $pegawaiItem->gambar) }}"
                                                                    alt="{{ $pegawaiItem->nama }}"
                                                                    style="width: 50px; height: 50px; object-fit: cover;">
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="email{{ $pegawaiItem->id }}"
                                                                class="form-label">Email</label>
                                                            <input type="email" id="email{{ $pegawaiItem->id }}"
                                                                name="email" class="form-control"
                                                                value="{{ $pegawaiItem->email }}" required>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="alamat{{ $pegawaiItem->id }}"
                                                                class="form-label">Alamat</label>
                                                            <input type="text" id="alamat{{ $pegawaiItem->id }}"
                                                                name="alamat" class="form-control"
                                                                value="{{ $pegawaiItem->alamat }}" required>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="jabatan_id{{ $pegawaiItem->id }}"
                                                                class="form-label">Jabatan</label>
                                                            <select id="jabatan_id{{ $pegawaiItem->id }}" name="jabatan_id"
                                                                class="form-select">
                                                                @foreach ($jabatans as $jabatan)
                                                                    <option value="{{ $jabatan->id }}"
                                                                        {{ $pegawaiItem->jabatan_id == $jabatan->id ? 'selected' : '' }}>
                                                                        {{ $jabatan->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Tambah Pegawai -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Pegawai</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control"
                                    placeholder="Nama" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="gambar" class="form-label">Gambar</label>
                                <input type="file" id="gambar" name="gambar" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="Email" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" id="alamat" name="alamat" class="form-control"
                                    placeholder="Alamat" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="jabatan_id" class="form-label">Jabatan</label>
                                <select id="jabatan_id" name="jabatan_id" class="form-select" required>
                                    @foreach ($jabatans as $jabatan)
                                        <option value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('pegawai.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'gambar',
                        name: 'gambar',
                        render: function(data, type, row) {
                            return data ?
                                `<img src="${data}" style="width: 50px; height: 50px; object-fit: cover;">` :
                                '';
                        }
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'jabatan.nama',
                        name: 'jabatan.nama'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endsection
