@extends('template.admin')

@section('title', 'Dashboard')

@section('content')
<section class="section">
    <div class="card shadow-lg">
        <div class="card-header">
            <h5 class="card-title">Dashboard</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Card for Pegawai Count -->
                <div class="col-md-4 mb-4">
                    <div class="card bg-dark text-white shadow-lg">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-person-fill fs-3 me-3"></i>
                            <div>
                                <h5 class="card-title">Jumlah Pegawai</h5>
                                <p class="card-text">{{ $pegawaiCount }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card for Jabatan Count -->
                <div class="col-md-4 mb-4">
                    <div class="card bg-secondary text-white shadow-lg">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-briefcase-fill fs-3 me-3"></i>
                            <div>
                                <h5 class="card-title">Jumlah Jabatan</h5>
                                <p class="card-text">{{ $jabatansCount }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card for Artikel Count -->
                <div class="col-md-4 mb-4">
                    <div class="card bg-primary text-white shadow-lg">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-file-text-fill fs-3 me-3"></i>
                            <div>
                                <h5 class="card-title">Jumlah Artikel</h5>
                                <p class="card-text">{{ $artikelsCount }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
