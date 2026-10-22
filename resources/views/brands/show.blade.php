@extends('layouts.app')

@section('title')
EarthLove Brands
@endsection

@section('content')

<section class="container py-5">
    <div class="mb-4">
        <a href="{{ route('admin.brands.index') }}" class="text-decoration-none text-secondary"> <i class="bi bi-arrow-left"></i> Torna ai Brand</a>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div> 
          <h1 class="fw-bold mb-1"> {{ $brand->name }} </h1> <p class="text-secondary mb-0"> Dettaglio brand </p>
        </div>
        <a href="{{ route('admin.brands.edit', $brand) }}"  class="btn btn-success rounded-pill px-4"> <i class="bi bi-pencil-square me-1"></i> Modifica </a>
    </div>
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <div class="row g-4">
                <div class="col-md-4 text-center">
                    <img  src="{{ asset('storage/'. $brand->image)}}"  alt="{{ $brand->name }}" class="img-fluid rounded-4" style="max-height:300px; object-fit:cover;">
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <small class="text-secondary"> ID </small>
                            <p class="fw-semibold mb-0"> {{ $brand->id }} </p>
                        </div>
                        <div class="col-12 mb-3">
                            <small class="text-secondary"> Descrizione </small>
                            <p class="mb-0"> {{ $brand->description }}</p>
                        </div>                     
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-white border-0 p-4 text-end">
            <button  type="button" class="btn btn-outline-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $brand->id }}"> <i class="bi bi-trash me-1"></i> Elimina brand </button>
        </div>
    </div>
    <x-delete-modal
        :id="$brand->id"
        :route="route('admin.brands.destroy', $brand)"
        :name="$brand->name"
    />
</section>

@endsection