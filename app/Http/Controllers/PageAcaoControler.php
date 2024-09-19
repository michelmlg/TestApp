<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PageAcaoControler extends Controller
{
    public function show($symbol)
    {
        // Aqui você pode buscar os dados da API usando o símbolo da ação
        // Exemplo de requisição para uma API fictícia
        $acao = $this->buscarDadosAcao($symbol);

        // Retorna a view com os detalhes da ação
        return view('acao.show', compact('acao'));
    }

    private function buscarDadosAcao($ticker)
    {
        // Chamada à API para buscar os detalhes da ação usando o símbolo
        // Exemplo: usando Guzzle para fazer requisição à API
        // $response = Http::get("https://api.example.com/acoes/{$symbol}");

        // Retorne dados de exemplo por enquanto
        $response = Http::get(getenv('BRAPI_API_URL') . "quote/{$ticker}?token=" . getenv('BRAPI_API_TOKEN'));

        // Verifique se a resposta foi bem-sucedida
        if ($response->successful()) {
            $data = $response->json(); // Decodifica a resposta JSON

            // Retorne os dados necessários do JSON da API
            return [
                'symbol' => $data['symbol'],
                'name' => $data['shortName'],
                'price' => $data['regularMarketPrice'],
                'logo' => $data['logourl']
            ];
        } else {
            // Lida com respostas malsucedidas (status 4xx ou 5xx)
            return [
                'symbol' => $symbol,
                'name' => 'Dados não encontrados',
                'price' => 0.00,
                'logo' => null
            ];
        }
    }
}
