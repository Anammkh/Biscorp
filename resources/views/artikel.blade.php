
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1 class="mb-4">{{ $artikel->judul }}</h1>

                <div class="mb-4">
                    @if($artikel->gambar)
                        <img src="{{ asset('storage/' . $artikel->gambar) }}" class="img-fluid rounded" alt="{{ $artikel->judul }}">
                    @else
                        <img src="default-image.jpg" class="img-fluid rounded" alt="Default Image">
                    @endif
                </div>

                <div class="article-content">
                    <p class="lead">{{ $artikel->isi }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
