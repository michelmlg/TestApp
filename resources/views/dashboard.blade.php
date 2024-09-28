<x-layout>
    <x-slot:pageTitle>
        Dashboard
    </x-slot:pageTitle>
    
    <h1>Dashboard</h1>

    <div class="container">
        <div class="row">
            <div class="col">
                @foreach($bdrs as $bdr)
                <a href="{{ route('acao.show',  ['symbol' => $bdr['stock']]) }}" style="text-decoration: none; color: inherit;">
                    <div class="card w-100 m-3 p-2 shadow-sm" style="border-radius: 10px;">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <img src="{{ $bdr['logo'] }}" class="img-thumbnail" style="width: 3rem; height: 3rem; border: none;">
                                <div class="ms-3">
                                    <h6 class="card-title mb-0 fw-bold">{{ $bdr['stock'] }}</h6>
                                    <p class="card-subtitle text-muted text-sm-start mb-0">{{ $bdr['name'] }}</p>
                                </div>
                            </div>
                            <div class="ms-auto text-end">
                                @if($bdr['change'] < 0)
                                    <p class="card-text text-danger mb-0">{{ number_format($bdr['change'], 2, ',','.')}}%</p>
                                    <p class="card-text text-danger mb-0 fw-bold">${{ number_format($bdr['close'], 2 ) }}</p>
                                @else
                                    <p class="card-text text-success mb-0">{{ number_format($bdr['change'], 2, ',','.') }}%</p>
                                    <p class="card-text text-success mb-0 fw-bold">${{ number_format($bdr['close'], 2) }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="col">
                <a href="{{ route('acao.show', ['symbol' => 'SAPR4']) }}" style="text-decoration: none; color: inherit;">
                    <div class="card w-100 p-2 shadow-sm" style="border-radius: 10px;">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <img src="https://s3-symbol-logo.tradingview.com/sanepar--big.svg" class="img-thumbnail" style="width: 3rem; height: 3rem; border: none;">
                                <div class="ms-3">
                                    <h6 class="card-title mb-0 fw-bold">Sanepar</h6>
                                    <p class="card-subtitle text-muted mb-0">SAPR4</p>
                                </div>
                            </div>
                            <p class="card-text text-success mb-0 fw-bold">$25.50</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                @foreach($acoes as $acao)
                <a href="{{ route('acao.show',  ['symbol' => $acao['stock']]) }}" style="text-decoration: none; color: inherit;">
                    <div class="card w-100 m-3 p-2 shadow-sm" style="border-radius: 10px;">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <img src="{{ $acao['logo'] }}" class="img-thumbnail" style="width: 3rem; height: 3rem; border: none;">
                                <div class="ms-3">
                                    <h6 class="card-title mb-0 fw-bold">{{ $acao['stock'] }}</h6>
                                    <p class="card-subtitle text-muted text-sm-start mb-0">{{ $acao['name'] }}</p>
                                </div>
                            </div>
                            <div class="ms-auto text-end">
                                @if($acao['change'] < 0)
                                    <p class="card-text text-danger mb-0">{{ number_format($acao['change'], 2, ',','.')}}%</p>
                                    <p class="card-text text-danger mb-0 fw-bold">R${{ number_format($acao['close'], 2, ',', '.') }}</p>
                                @else
                                    <p class="card-text text-success mb-0">{{ number_format($acao['change'], 2, ',','.') }}%</p>
                                    <p class="card-text text-success mb-0 fw-bold">R${{ number_format($acao['close'], 2, ',', '.') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
