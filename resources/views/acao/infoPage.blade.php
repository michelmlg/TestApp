<x-layout>
    <x-slot:pageTitle>
        {{ $acao['symbol'] }} - {{ $acao['shortName'] }}

        
    </x-slot:pageTitle>
    
    <div class="container my-4">
        {{-- Card Principal da Ação --}}
        <x-acao-card :acao="$acao" />

        {{-- Detalhes da Ação --}}
        <x-acao-detalhes :acao="$acao" />

        {{-- Histórico de Preços --}}
        <x-historico-precos :historico="$acao['historicalDataPrice']" />
    </div>
</x-layout>

