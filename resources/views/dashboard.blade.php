@extends('layouts.app')

@section('title')
EarthLove Dashboard
@endsection

@section('content')

<div class="container py-5">
    <div class="mb-5">
        <h2 class="fw-bold text-dark">{{ __('Dashboard') }}</h2>
        <p class="text-secondary mb-0">Gestisci i contenuti del sito EarthLove da un unico spazio.</p>
    </div>
    <div class="row g-4">
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('admin.products.index') }}" class="text-decoration-none">
                <div class="card border-0 rounded-4 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-box-seam text-success fs-1"></i>
                        <h5 class="mt-3 text-dark">I prodotti</h5>
                        <p class="text-secondary small mb-0">Aggiungi, modifica e gestisci il catalogo prodotti.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('admin.categories.index') }}" class="text-decoration-none">
                <div class="card border-0 rounded-4 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-grid text-success fs-1"></i>
                        <h5 class="mt-3 text-dark">Le categorie</h5>
                        <p class="text-secondary small mb-0">Organizza i prodotti nelle categorie corrette.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('admin.brands.index') }}" class="text-decoration-none">
                <div class="card border-0 rounded-4 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-award text-success fs-1"></i>
                        <h5 class="mt-3 text-dark">I brand</h5>
                        <p class="text-secondary small mb-0">Gestisci i marchi presenti sul sito.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('admin.tags.index') }}" class="text-decoration-none">
                <div class="card border-0 rounded-4 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-tags text-success fs-1"></i>
                        <h5 class="mt-3 text-dark">I tag</h5>
                        <p class="text-secondary small mb-0">Gestisci le etichette dei prodotti.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="mt-5 p-4 rounded-4" style="background-color:#f3efe6;">
        <div class="d-flex align-items-center">
            <i class="bi bi-leaf text-success fs-2 me-3"></i>
            <p class="mb-0 text-secondary">{{ __('You are logged in!') }} Puoi iniziare a gestire il contenuto del tuo sito.</p>
        </div>
    </div>
</div>
@endsection