@extends('layouts.app')

@section('title')
EarthLove Brands
@endsection

@section('content')

<section class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold mb-1">Gestione brand</h1>
            <p class="text-secondary mb-0"> Visualizza e aggiorna i Brand EarthLove.</p>
        </div>
        <a href="{{ route('admin.brands.create') }}" class="btn btn-success rounded-pill px-4"> <i class="bi bi-plus-lg me-1"></i> Nuovo Brand </a>
    </div>

    <div class="mb-4">
        <a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-secondary"> <i class="bi bi-arrow-left"></i> Torna alla Dashboard </a>
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
                            <th class="text-end pe-4">Azioni </th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($brands as $brand)
                        <tr>
                            <td class="ps-4">{{ $brand->id }}</td>
                            <td>
                                <img  src="{{ asset('storage/'. $brand->image)}}" alt="{{ $brand->name }}" class="rounded-3" style="width:70px;height:70px;object-fit:cover;">
                            </td>
                            <td class="fw-semibold">{{ $brand->name }}</td>
                            <td class="text-end pe-4"> 
                                <a href="{{ route('admin.brands.show', $brand) }}"class="btn btn-outline-success btn-sm rounded-pill"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('admin.brands.edit', $brand) }}"class="btn btn-outline-primary btn-sm rounded-pill"><i class="bi bi-pencil"></i></a>
                                <button 
                                type="button"
                                class="btn btn-outline-danger btn-sm rounded-pill"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $brand->id }}">
                                <i class="bi bi-trash"></i>
                                </button>
                                <x-delete-modal 
                                :id="$brand->id" 
                                :route="route('admin.brands.destroy', $brand)" 
                                :name="$brand->name"/>
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