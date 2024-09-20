<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AcaoControler extends Controller
{
    public function show($symbol)
    {
        // Aqui você pode buscar os dados da API usando o símbolo da ação
        // Exemplo de requisição para uma API fictícia
        $acao = $this->buscarDadosAcao($symbol);

        // Retorna a view com os detalhes da ação
        return view('acao.infoPage', compact('acao'));
    }

    private function buscarDadosAcao($ticker)
{
    // Chamada à API para buscar os detalhes da ação usando o símbolo
    $response = Http::get(getenv('BRAPI_API_URL') . "quote/{$ticker}?token=" . getenv('BRAPI_API_TOKEN'));

    // Verifique se a resposta foi bem-sucedida
    if ($response->successful()) {
        $data = $response->json(); // Decodifica a resposta JSON

        // Acesse os dados dentro de "results"
        $acao = $data['results'][0] ?? null;

        if ($acao) {
            return [
                'symbol' => $acao['symbol'] ?? 'N/A',
                'name' => $acao['shortName'] ?? 'Nome não disponível',
                'price' => $acao['regularMarketPrice'] ?? 0.00,
                'logo' => $acao['logourl'] ?? null
            ];
        }
    }
    // Lida com respostas malsucedidas ou ausência de dados
    return [
        'symbol' => $ticker,
        'name' => 'Dados não encontrados',
        'price' => 0.00,
        'logo' => null
    ];
}


           
}
