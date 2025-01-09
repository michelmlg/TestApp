@php
 // Definir o limite de quantos ativos exibir
    $limit = isset($_GET['limit']) ? intval($_GET['limit']) : 5;

    // Verificar o número total de ações e ajustar o limite ao número total, se necessário
    $totalAcoes = count($acoes);
    $limit = min($limit, $totalAcoes); // Garante que o limite não exceda o total de ações
@endphp

<x-layout.default>
    <x-slot:pageTitle>
        Dashboard
    </x-slot:pageTitle>
    <main>
        
        <section class="container-fluid banner p-0" style="position: relative; height: 420px;">
            <img src="https://asset.chase.com/content/services/structured-image/image.desktopLarge.jpg/articles/thumbnail-image-large/how-does-the-stock-market-work-2560x1440.jpg" 
                 alt="Banner Image" 
                 class="img-fluid" 
                 style="width: 100%; height: 40vh; object-fit: cover; filter: grayscale(90%);">
            
            <!-- Overlay com opacidade -->
            <div class="overlay" 
                 style="position: absolute; top: 0; left: 0; width: 100%; height: 40vh; background-color: hsla(265, 25%, 35%, 0.8);">
            </div>
    
            <!-- Texto sobre a imagem -->
            <div class="banner-text" 
                 style="position: absolute; top: 40%; left: 50%; transform: translate(-50%, -50%); color: white; text-align: center;">
                <h2>Dashboard de Ativos</h2>
                <p>Visualize e compare ativos financeiros</p>
            </div>
        </section>

        <div class="container-sm">
            <div class="row">
                <div class="col ms-3 border-0">
                    <p class="mt-2 fw-bold"><span class="fas fa-chart-column"></span> Ações</p>
                    <hr>
                    @foreach($acoes as $acao)
                    <a href="{{ route('acao.show',  ['symbol' => $acao['stock']]) }}" style="text-decoration: none; color: inherit; ">
                        <div class="w-100 stocks p-2 mt-3">

                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $acao['logo'] }}" class="rounded" style="width: 3rem; height: 3rem; border: none;">
                                    <div class="ms-3">
                                        <h6 class="mb-0 fw-bold">{{ $acao['stock'] }}</h6>
                                        <p class="text-muted text-sm-start mb-0">{{ $acao['name'] }}</p>
                                    </div>
                                </div>
                                <div class="ms-auto text-end">
                                    @if($acao['change'] < 0)
                                        <p class="text-danger mb-0">{{ number_format($acao['change'], 2, ',','.')}}%</p>
                                        <p class="text-danger mb-0 fw-bold">R${{ number_format($acao['close'], 2 ) }}</p>
                                    @else
                                        <p class="text-success mb-0">+{{ number_format($acao['change'], 2, ',','.') }}%</p>
                                        <p class="text-success mb-0 fw-bold">R${{ number_format($acao['close'], 2) }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
                    


                </div>
                <div class="col ms-3 border-0">
                    <p class="mt-2 fw-bold"><span class="fas fa-building"></span> FIIs</p>
                    <hr>
                    @foreach($fiis as $fii)
                    <a href="{{ route('acao.show',  ['symbol' => $fii['stock']]) }}" style="text-decoration: none; color: inherit; ">
                        <div class="w-100 stocks p-2 mt-3">

                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $fii['logo'] }}" style="width: 3rem; height: 3rem; border: none;">
                                    <div class="ms-3">
                                        <h6 class="mb-0 fw-bold">{{ $fii['stock'] }}</h6>
                                        <p class="text-muted text-sm-start mb-0">{{ $fii['name'] }}</p>
                                    </div>
                                </div>
                                <div class="ms-auto text-end">
                                    @if($fii['change'] < 0)
                                        <p class="text-danger mb-0">{{ number_format($fii['change'], 2, ',','.')}}%</p>
                                        <p class="text-danger mb-0 fw-bold">R${{ number_format($fii['close'], 2 ) }}</p>
                                    @else
                                        <p class="text-success mb-0">+{{ number_format($fii['change'], 2, ',','.') }}%</p>
                                        <p class="text-success mb-0 fw-bold">R${{ number_format($fii['close'], 2) }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach


                </div>
                <div class="col ms-3 border-0">
                    <p class="mt-2 fw-bold"><span class="fas fa-money-bill"></span> BDRs</p>
                    <hr>
                    @foreach($bdrs as $bdr)
                    <a href="{{ route('acao.show',  ['symbol' => $bdr['stock']]) }}" style="text-decoration: none; color: inherit; ">
                        <div class="w-100 stocks p-2 mt-3">

                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $bdr['logo'] }}" style="width: 3rem; height: 3rem; border: none;">
                                    <div class="ms-3">
                                        <h6 class="mb-0 fw-bold">{{ $bdr['stock'] }}</h6>
                                        <p class="text-muted text-sm-start mb-0">{{ $bdr['name'] }}</p>
                                    </div>
                                </div>
                                <div class="ms-auto text-end">
                                    @if($bdr['change'] < 0)
                                        <p class="text-danger mb-0">{{ number_format($bdr['change'], 2, ',','.')}}%</p>
                                        <p class="text-danger mb-0 fw-bold">R${{ number_format($bdr['close'], 2 ) }}</p>
                                    @else
                                        <p class="text-success mb-0">+{{ number_format($bdr['change'], 2, ',','.') }}%</p>
                                        <p class="text-success mb-0 fw-bold">R${{ number_format($bdr['close'], 2) }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach


                </div>
            </div>
        </div>

        
    
    
    </main>
</x-layout.default>
