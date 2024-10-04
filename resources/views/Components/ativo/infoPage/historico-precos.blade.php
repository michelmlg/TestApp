<div class="mt-4 p-3 shadow-sm bg-white" style="border-radius: 10px;">
    <h5>Histórico de Preços</h5>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Data</th>
                <th>Abertura</th>
                <th>Máxima</th>
                <th>Mínima</th>
                <th>Fechamento</th>
                <th>Volume</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($historico as $dia)
                <tr>
                    <td>{{ date('d/m/Y', $dia['date']) }}</td>
                    <td>R${{ number_format($dia['open'], 2, ',', '.') }}</td>
                    <td>R${{ number_format($dia['high'], 2, ',', '.') }}</td>
                    <td>R${{ number_format($dia['low'], 2, ',', '.') }}</td>
                    <td>R${{ number_format($dia['close'], 2, ',', '.') }}</td>
                    <td>{{ number_format($dia['volume']) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
