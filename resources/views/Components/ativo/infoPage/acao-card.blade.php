<div class="card w-100 p-2 shadow-sm" style="border-radius: 10px;">
    <div class="d-flex align-items-center justify-content-between">
        <img src="{{ $ativo['logourl'] }}" class="img-thumbnail rounded-circle" style="width: 5rem; height: 5rem; border: none;">
        <div class="ms-3">
            <h6 class="card-title mb-0 fw-bold">{{ $ativo['shortName'] }}</h6>
            <p class="card-subtitle text-muted mb-0">{{ $ativo['longName'] }}</p>
        </div>
        <p class="card-text {{ $ativo['regularMarketChange'] > 0 ? 'text-success' : 'text-danger' }} mb-0 fw-bold">
            R${{ number_format($ativo['regularMarketPrice'], 2, ',', '.') }}
        </p>
    </div>
</div>
