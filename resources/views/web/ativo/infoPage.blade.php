<x-layout.default>
    <x-slot:pageTitle>
        {{ $ativo['symbol'] }} - {{ $ativo['shortName'] }}

        
    </x-slot:pageTitle>
    
    <div class="container my-4" style="padding-left: 6rem; padding-right: 6rem;">
        {{-- Card Principal da Ação --}}
        <x-ativo.infoPage.acao-card :ativo="$ativo" />

        {{-- Detalhes da Ação --}}
        <div class="row">
            <div class="col-6">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Preço Máximo do Dia: R${{ number_format($ativo['regularMarketDayHigh'], 2, ',', '.') }}</li>
                    <li class="list-group-item">Preço Mínimo do Dia: R${{ number_format($ativo['regularMarketDayLow'], 2, ',', '.') }}</li>
        <li class="list-group-item">Volume de Negociação: {{ number_format($ativo['regularMarketVolume']) }}</li>
        <li class="list-group-item">Variação: {{ $ativo['regularMarketChangePercent'] > 0 ? '+' : '' }}{{ number_format($ativo['regularMarketChangePercent'], 2) }}%</li>
        <li class="list-group-item">Intervalo das Últimas 52 Semanas: {{ $ativo['fiftyTwoWeekRange'] }}</li>
    </ul>
            </div>
            <div class="col-6">
                <x-ativo.infoPage.acao-detalhes :ativo="$ativo" />
            </div>
        </div>

        {{-- Histórico de Preços --}}
        <x-ativo.infoPage.historico-precos :historico="$ativo['historicalDataPrice']" />
    </div>
</x-layout.default>

