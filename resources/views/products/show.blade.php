@extends('layouts.app')

@section('title')
EarthLove Products
@endsection

@section('content')

<section class="container py-5">
    <div class="mb-4">
        <a href="{{ route('admin.products.index') }}" class="text-decoration-none text-secondary"> <i class="bi bi-arrow-left"></i> Torna ai prodotti</a>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div> 
          <h1 class="fw-bold mb-1"> {{ $product->name }} </h1> <p class="text-secondary mb-0"> Dettaglio prodotto </p>
        </div>
        <a href="{{ route('admin.products.edit', $product) }}"  class="btn btn-success rounded-pill px-4"> <i class="bi bi-pencil-square me-1"></i> Modifica </a>
    </div>
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <div class="row g-4">
                <div class="col-md-4 text-center">
                    <img  src="{{ asset('storage/'. $product->image)}}"  alt="{{ $product->name }}" class="img-fluid rounded-4" style="max-height:300px; object-fit:cover;">
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <small class="text-secondary"> ID </small>
                            <p class="fw-semibold mb-0"> {{ $product->id }} </p>
                        </div>
                        <div class="col-md-6 mb-3"> <small class="text-secondary"> Prezzo </small>
                            <p class="fw-semibold mb-0"> € {{ $product->price }} </p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <small class="text-secondary">Categoria</small>
                            <p class="mb-0"> {{ $product->category?->name ?? 'Categoria non assegnata' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <small class="text-secondary"> Brand </small>
                            <p class="mb-0"> {{ $product->brand?->name ?? 'Brand non assegnato' }}</p>
                        </div>
                        <div class="col-12 mb-3">
                            <small class="text-secondary"> Descrizione </small>
                            <p class="mb-0"> {{ $product->description }}</p>
                        </div>
                        <div class="col-12">
                            <small class="text-secondary d-block mb-2"> Tags </small>
                            @foreach ($product->tags as $tag)
                                <span class="badge rounded-pill bg-light text-dark me-1"> {{ $tag->name }} </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-white border-0 p-4 text-end">
            <button  type="button" class="btn btn-outline-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->id }}"> <i class="bi bi-trash me-1"></i> Elimina prodotto </button>
        </div>
    </div>
    <x-delete-modal
        :id="$product->id"
        :route="route('admin.products.destroy', $product)"
        :name="$product->name"
    />
</section>

@endsection