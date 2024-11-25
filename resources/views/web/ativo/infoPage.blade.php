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
                Teste
            </div>
            <div class="col-6">
                <x-ativo.infoPage.acao-detalhes :ativo="$ativo" />
            </div>
        </div>

        {{-- Histórico de Preços --}}
        <x-ativo.infoPage.historico-precos :historico="$ativo['historicalDataPrice']" />
    </div>
</x-layout.default>

