@extends('layouts.app')

@section('title')
EarthLove Products
@endsection

@section('content')

<section class="container py-5">
    <div class="mb-4">
        <a href="{{ route('admin.tags.index') }}" class="text-decoration-none text-secondary"> <i class="bi bi-arrow-left"></i> Torna ai tag</a>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div> 
          <h1 class="fw-bold mb-1"> {{ $tag->name }} </h1> <p class="text-secondary mb-0"> Dettaglio tag </p>
        </div>
        <a href="{{ route('admin.tags.edit', $tag) }}"  class="btn btn-success rounded-pill px-4"> <i class="bi bi-pencil-square me-1"></i> Modifica </a>
    </div>
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <div class="row g-4">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <small class="text-secondary"> ID </small>
                            <p class="fw-semibold mb-0"> {{ $tag->id }} </p>
                        </div>
                        <div class="col-12 mb-3">
                            <small class="text-secondary"> Descrizione </small>
                            <p class="mb-0"> {{ $tag->description }}</p>
                        </div>                     
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-white border-0 p-4 text-end">
            <button  type="button" class="btn btn-outline-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $tag->id }}"> <i class="bi bi-trash me-1"></i> Elimina tag </button>
        </div>
    </div>
    <x-delete-modal
        :id="$tag->id"
        :route="route('admin.tags.destroy', $tag)"
        :name="$tag->name"
    />
</section>

@endsection