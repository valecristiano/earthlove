@extends('layouts.app')

@section('title')
EarthLove Products
@endsection

@section('content')

<section class="container py-5">
    <div class="mb-4">
        <a href="{{ route('admin.products.index') }}" class="text-decoration-none text-secondary"> <i class="bi bi-arrow-left"></i> Torna indietro </a>
    </div>
    <div class="mb-4">
        <h1 class="fw-bold"> Crea prodotto </h1>
        <p class="text-secondary mb-0"> Aggiungi le informazioni del prodotto nel catalogo EarthLove. </p>
    </div>
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold"> Nome </label>
                            <input type="text" class="form-control rounded-3" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="price" class="form-label fw-semibold"> Prezzo </label>
                            <input type="number" class="form-control rounded-3" id="price" name="price" step="0.01" min="0"  required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="description" class="form-label fw-semibold"> Descrizione </label>
                            <textarea class="form-control rounded-3" id="description" name="description" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="stock" class="form-label fw-semibold"> Quantità in magazzino </label>
                            <input type="number" class="form-control rounded-3" id="stock" name="stock" min="0" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="category_id" class="form-label fw-semibold">Categoria </label>
                            <select name="category_id" id="category_id" class="form-select rounded-3">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}"> 
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="brand_id" class="form-label fw-semibold"> Brand </label>
                            <select name="brand_id" id="brand_id" class="form-select rounded-3">
                                @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">
                                    {{ $brand->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label fw-semibold d-block"> Tag </label>
                            @foreach ($tags as $tag)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input"type="checkbox" id="tag-{{$tag->id}}" name="tags[]" value="{{$tag->id}}">
                                <label class="form-check-label" for="tag-{{$tag->id}}"> {{ $tag->name }} </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3"> <label for="image" class="form-label fw-semibold"> Immagine prodotto
                            </label>
                            <input class="form-control rounded-3" type="file" id="image" name="image">
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-end">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-light rounded-pill px-4 me-2"> Annulla </a>
                    <button type="submit" class="btn btn-success rounded-pill px-4"> <i class="bi bi-check-lg me-1"></i> Salva prodotto </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection