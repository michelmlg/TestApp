<div class="mt-4 p-3 shadow-sm bg-white" style="border-radius: 10px;">
    <h5>Detalhes da Ação</h5>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Preço Máximo do Dia: R${{ number_format($acao['regularMarketDayHigh'], 2, ',', '.') }}</li>
        <li class="list-group-item">Preço Mínimo do Dia: R${{ number_format($acao['regularMarketDayLow'], 2, ',', '.') }}</li>
        <li class="list-group-item">Volume de Negociação: {{ number_format($acao['regularMarketVolume']) }}</li>
        <li class="list-group-item">Variação: {{ $acao['regularMarketChangePercent'] > 0 ? '+' : '' }}{{ number_format($acao['regularMarketChangePercent'], 2) }}%</li>
        <li class="list-group-item">Intervalo das Últimas 52 Semanas: {{ $acao['fiftyTwoWeekRange'] }}</li>
    </ul>
</div>
