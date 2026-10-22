@extends('layouts.app')

@section('title')
EarthLove Products
@endsection

@section('content')

<section class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold mb-1">Gestione prodotti</h1>
            <p class="text-secondary mb-0">
                Visualizza e aggiorna il catalogo EarthLove.
            </p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="btn btn-success rounded-pill px-4">
            <i class="bi bi-plus-lg me-1"></i>
            Nuovo prodotto
        </a>
    </div>

    <div class="mb-4">
        <a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-secondary">
            <i class="bi bi-arrow-left"></i>
            Torna alla Dashboard
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Immagine</th>
                            <th>Nome</th>
                            <th>Prezzo</th>
                            <th>Categoria</th>
                            <th>Brand</th>
                            <th class="text-end pe-4">Azioni </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="ps-4">{{ $product->id }}</td>
                            <td>
                                <img 
                                src="{{ asset('storage/'. $product->image)}}"
                                alt="{{ $product->name }}"
                                class="rounded-3"
                                style="width:70px;height:70px;object-fit:cover;">
                            </td>
                            <td class="fw-semibold">{{ $product->name }}</td>
                            <td>€ {{ $product->price }}</td>
                            <td><span class="badge rounded-pill bg-light text-dark">{{ $product->category?->name ?? 'Categoria non assegnata' }}</span>
                            </td>
                            <td><span class="badge rounded-pill bg-light text-dark">{{ $product->brand?->name ?? 'Brand non assegnato' }}</span>
                            </td>
                            <td class="text-end pe-4"> 
                                <a href="{{ route('admin.products.show', $product) }}"class="btn btn-outline-success btn-sm rounded-pill"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('admin.products.edit', $product) }}"class="btn btn-outline-primary btn-sm rounded-pill"><i class="bi bi-pencil"></i></a>
                                <button 
                                type="button"
                                class="btn btn-outline-danger btn-sm rounded-pill"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $product->id }}">
                                <i class="bi bi-trash"></i>
                                </button>
                                <x-delete-modal 
                                :id="$product->id" 
                                :route="route('admin.products.destroy', $product)" 
                                :name="$product->name"/>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection