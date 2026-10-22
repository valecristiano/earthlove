@extends('layouts.app')

@section('title')
EarthLove Products
@endsection

@section('content')

<section class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold mb-1">Gestione tag</h1>
            <p class="text-secondary mb-0"> Visualizza e aggiorna i tag EarthLove.</p>
        </div>
        <a href="{{ route('admin.tags.create') }}" class="btn btn-success rounded-pill px-4"> <i class="bi bi-plus-lg me-1"></i> Nuovo tag </a>
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
                            
                            <th>Nome</th>
                            <th class="text-end pe-4">Azioni </th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($tags as $tag)
                        <tr>
                            <td class="ps-4">{{ $tag->id }}</td>
                            
                            <td class="fw-semibold">{{ $tag->name }}</td>
                            <td class="text-end pe-4"> 
                                <a href="{{ route('admin.tags.show', $tag) }}"class="btn btn-outline-success btn-sm rounded-pill"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('admin.tags.edit', $tag) }}"class="btn btn-outline-primary btn-sm rounded-pill"><i class="bi bi-pencil"></i></a>
                                <button 
                                type="button"
                                class="btn btn-outline-danger btn-sm rounded-pill"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $tag->id }}">
                                <i class="bi bi-trash"></i>
                                </button>
                                <x-delete-modal 
                                :id="$tag->id" 
                                :route="route('admin.tags.destroy', $tag)" 
                                :name="$tag->name"/>
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