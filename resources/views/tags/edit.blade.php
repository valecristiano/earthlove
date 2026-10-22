@extends('layouts.app')

@section('title')
EarthLove Products
@endsection

@section('content')

<section class="container py-5">
    <div class="mb-4">
        <a href="{{ route('admin.tags.show', $tag) }}" class="text-decoration-none text-secondary"> <i class="bi bi-arrow-left"></i> Torna al tag </a>
    </div>
    <div class="mb-4">
        <h1 class="fw-bold"> Modifica tag </h1>
        <p class="text-secondary mb-0"> Aggiorna le informazioni del tag. </p>
    </div>
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <form action="{{ route('admin.tags.update', $tag) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold"> Nome </label>
                            <input type="text" class="form-control rounded-3" id="name" name="name" value="{{$tag->name}}" required>
                        </div>
                    </div>
                
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="description" class="form-label fw-semibold"> Descrizione </label>
                            <textarea class="form-control rounded-3" id="description" name="description" rows="4">{{$tag->description}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-end">
                    <a href="{{ route('admin.tags.index') }}" class="btn btn-light rounded-pill px-4 me-2"> Annulla </a>
                    <button type="submit" class="btn btn-outline-success rounded-pill px-4"> <i class="bi bi-check-lg me-1"></i> Salva tag </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection