@extends('layouts.app')

@section('title')
EarthLove Categories
@endsection

@section('content')

<section class="container py-5">
    <div class="mb-4">
        <a href="{{ route('admin.categories.show', $category) }}" class="text-decoration-none text-secondary"> <i class="bi bi-arrow-left"></i> Torna alla categoria </a>
    </div>
    <div class="mb-4">
        <h1 class="fw-bold"> Modifica categoria </h1>
        <p class="text-secondary mb-0"> Aggiorna le informazioni della categoria EarthLove. </p>
    </div>
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold"> Nome </label>
                            <input type="text" class="form-control rounded-3" id="name" name="name" value="{{$category->name}}" required>
                        </div>
                    </div>
                
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="description" class="form-label fw-semibold"> Descrizione </label>
                            <textarea class="form-control rounded-3" id="description" name="description" rows="4">{{$category->description}}</textarea>
                        </div>
                    </div>
                   
                    <div class="col-md-6">
                        <div class="mb-3"> 
                            <label for="image" class="form-label fw-semibold"> Immagine categoria </label>
                            <input class="form-control rounded-3" type="file" id="image" name="image">
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <label class="form-label fw-semibold d-block"> Immagine attuale </label>
                        <img src="{{ asset('storage/'. $category->image)}}" alt="{{ $category->name }}"class="rounded-4"style="width:180px;height:180px;object-fit:cover;">
                    </div>
                </div>
                <div class="mt-4 text-end">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-light rounded-pill px-4 me-2"> Annulla </a>
                    <button type="submit" class="btn btn-success rounded-pill px-4"> <i class="bi bi-check-lg me-1"></i> Salva categoria </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection