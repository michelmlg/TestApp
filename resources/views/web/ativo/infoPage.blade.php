<x-layout.default>
    <x-slot:pageTitle>
        {{ $ativo['symbol'] }} - {{ $ativo['shortName'] }}

        
    </x-slot:pageTitle>
    
    <div class="container my-4">
        {{-- Card Principal da Ação --}}
        <x-ativo.infoPage.acao-card :ativo="$ativo" />

        {{-- Detalhes da Ação --}}
        <x-ativo.infoPage.acao-detalhes :ativo="$ativo" />

        {{-- Histórico de Preços --}}
        <x-ativo.infoPage.historico-precos :historico="$ativo['historicalDataPrice']" />
    </div>
</x-layout.default>

