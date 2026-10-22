@if (session('success'))
<div class="container pt-4">
    <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Chiudi">
        </button>
    </div>
</div>
@endif

@if ($errors->any())
<div class="container pt-4">
    <div class="alert alert-danger rounded-4 shadow-sm">
        <strong>Sono presenti alcuni errori:</strong>
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif