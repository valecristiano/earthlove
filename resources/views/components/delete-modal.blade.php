<div class="modal fade" 
    id="deleteModal{{ $id }}" 
    tabindex="-1" 
    aria-labelledby="deleteModalLabel{{ $id }}" 
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4">
            <div class="modal-header border-0">
                <h1 class="modal-title fs-5 fw-bold" id="deleteModalLabel{{ $id }}"> Conferma eliminazione </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-secondary me-auto"> Stai per eliminare definitivamente: <strong> {{ $name }} </strong></div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light rounded-pill" data-bs-dismiss="modal"> Annulla </button>
                <form action="{{ $route }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger rounded-pill"> <i class="bi bi-trash me-1"></i> Elimina </button>
                </form>
            </div>
        </div>
    </div>
</div>
