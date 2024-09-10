@extends('template.admin')

@section('title', 'Daftar Artikel')

@section('content')
    <!-- Section Tabel Artikel -->
    <section class="section">
        <div class="card shadow-lg">
            <div class="card-header">
                <h5 class="card-title">Daftar Artikel</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                    Tambah Artikel
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive datatable-minimal">
                    <table class="table" id="table2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($artikels as $artikel)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $artikel->judul }}</td>
                                    <td>
                                        @if ($artikel->gambar)
                                            <img src="{{ asset('storage/' . $artikel->gambar) }}"
                                                alt="{{ $artikel->judul }}" style="width: 70px;">
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#viewModal{{ $artikel->id }}">
                                            Lihat
                                        </button>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $artikel->id }}">
                                            Edit
                                        </button>
                                        <form action="{{ route('artikels.destroy', $artikel->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger"
                                                onclick="showDeleteConfirmation()">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Artikel dalam Card -->
    <section class="section mt-4">
        <div class="container">
            <div class="row">
                @foreach ($artikels as $artikel)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-lg">
                            @if ($artikel->gambar)
                                <img src="{{ asset('storage/' . $artikel->gambar) }}" class="card-img-top"
                                    alt="{{ $artikel->judul }}" style="height: 200px; object-fit: cover; width: 100%;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $artikel->judul }}</h5>
                                <p class="card-text">{{ Str::limit($artikel->isi, 100) }}</p>
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#viewModal{{ $artikel->id }}">Lihat Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Modal Tambah Artikel -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Artikel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('artikels.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="judul">Judul Artikel</label>
                            <input type="text" name="judul" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="isi">Isi Artikel</label>
                            <textarea name="isi" class="form-control" rows="7" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" class="form-control-file">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Lihat Artikel -->
    @foreach ($artikels as $artikel)
        <div class="modal fade" id="viewModal{{ $artikel->id }}" tabindex="-1"
            aria-labelledby="viewModalLabel{{ $artikel->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewModalLabel{{ $artikel->id }}">{{ $artikel->judul }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if ($artikel->gambar)
                            <img src="{{ asset('storage/' . $artikel->gambar) }}" class="img-fluid"
                                alt="{{ $artikel->judul }}">
                        @endif
                        <p>{{ $artikel->isi }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal Edit Artikel -->
    @foreach ($artikels as $artikel)
        <div class="modal fade" id="editModal{{ $artikel->id }}" tabindex="-1"
            aria-labelledby="editModalLabel{{ $artikel->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $artikel->id }}">Edit Artikel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('artikels.update', $artikel->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="judul">Judul Artikel</label>
                                <input type="text" name="judul" class="form-control" value="{{ $artikel->judul }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="isi">Isi Artikel</label>
                                <textarea name="isi" class="form-control" rows="7" required>{{ $artikel->isi }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar (opsional)</label>
                                <input type="file" name="gambar" class="form-control-file">
                                @if ($artikel->gambar)
                                    <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}"
                                        style="width: 100px;">
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
