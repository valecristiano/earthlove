@extends('layouts.app')

@section('title')
EarthLove Admin
@endsection

@section('content')

<div class="container py-5">
    <div class="p-5 rounded-4 mb-4" style="background-color:#f3efe6;">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-5 fw-bold text-dark">Benvenuto in EarthLove</h1>
                <p class="fs-5 text-secondary mt-3"> Pannello di gestione del sito. Da qui puoi amministrare prodotti, categorie, brand e tag per mantenere aggiornato il catalogo EarthLove.</p>
                @guest
                    <a href="{{ route('login') }}" class="btn btn-success rounded-pill px-4 mt-3">
                        Accedi al pannello
                    </a>
                @endguest
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-success rounded-pill px-4 mt-3">
                        <i class="bi bi-speedometer2 me-1"></i> Vai alla Dashboard
                    </a>
                @endauth
            </div>
            <div class="col-lg-4 text-center mt-4 mt-lg-0">
                <i class="bi bi-leaf text-success" style="font-size: 7rem;"></i>
            </div>
        </div>
    </div>

    <div class="container text-center py-4">
        <h2 class="fw-bold">
            Gestisci il tuo ecosistema digitale
        </h2>
        <p class="text-secondary"> Organizza i contenuti del sito e cura ogni dettaglio dell'esperienza EarthLove. </p>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="text-center p-4">
                <i class="bi bi-box-seam text-success fs-1"></i>
                <h5 class="mt-3">
                    Prodotti
                </h5>
                <p class="text-muted">Aggiungi e aggiorna i prodotti presenti nel catalogo.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="text-center p-4">
                <i class="bi bi-grid text-success fs-1"></i>
                <h5 class="mt-3">Organizzazione</h5>
                <p class="text-muted">Gestisci categorie, brand e tag per una migliore navigazione.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="text-center p-4">
                <i class="bi bi-heart text-success fs-1"></i>
                <h5 class="mt-3">EarthLove</h5>
                <p class="text-muted">Mantieni il sito coerente con i valori del progetto.</p>
            </div>
        </div>
    </div>
</div>

@endsection