<x-layout>
    <x-slot:pageTitle>
        {{ $acao['name'] }} - {{ $acao['symbol'] }}
    </x-slot:pageTitle>

    <div class="container">
        <div class="card w-100 p-2 shadow-sm" style="border-radius: 10px;">
            <div class="d-flex align-items-center justify-content-between">
                <img src="{{ $acao['logo'] }}" class="img-thumbnail" style="width: 5rem; height: 5rem; border: none;">
                <div class="ms-3">
                    <h6 class="card-title mb-0 fw-bold">{{ $acao['name'] }}</h6>
                    <p class="card-subtitle text-muted mb-0">{{ $acao['symbol'] }}</p>
                </div>
                <p class="card-text text-success mb-0 fw-bold">${{ $acao['price'] }}</p>
            </div>
        </div>
    </div>
</x-layout>
