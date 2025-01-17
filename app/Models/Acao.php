<?php
namespace App\Models;

use Illuminate\Support\Facades\Http;

class Acao
{

    public static function buscarDadosAtivo($ticker)
    {   
        // Chamada à API para buscar os detalhes da ação usando o símbolo
        $response = Http::get(getenv('BRAPI_API_URL') . "quote/$ticker?range=3mo&interval=1d&fundamental=true&modules=summaryProfile&token=" . getenv('BRAPI_API_TOKEN'));

        if ($response->successful()) {
            $data = $response->json();

            // Acesse os dados dentro de "results"
            $ativo = $data['results'][0] ?? null;

            return $ativo;
        }
        // Lida com respostas malsucedidas ou ausência de dados
        return [
            'symbol' => $ticker,
            'name' => 'Dados não encontrados',
            'price' => 0.00,
            'logo' => null
        ];
    }

    public static function buscarAcoesMarketCap($limite)
    {
        
        $request = getenv('BRAPI_API_URL') . "quote/list?type=stock&sortBy=market_cap_basic&sortOrder=desc&limit=$limite&token=" . getenv('BRAPI_API_EXAMPLE');

        // Faz a requisição à API
        $response = Http::get($request);

        // Verifica se a resposta foi bem-sucedida
        if ($response->successful()) {
            $stocks = $response->json()['stocks'];

            // Filtra ações que não terminam com 'F'
            $nonFractionalStocks = array_filter($stocks, function ($stock) {
                return substr($stock['stock'], -1) !== 'F';  // Verifica se a ação não termina com 'F'
            });

            // Retorna a lista de ações filtradas
            return $nonFractionalStocks;
        }

        // Retorna um array vazio em caso de erro
        return [];
    }

    public static function buscarBdrMarketCap($limite)
    {
        // Constrói a URL da requisição para buscar ações com base no market cap
        $request = getenv('BRAPI_API_URL') . "quote/list?type=bdr&sortBy=market_cap_basic&sortOrder=desc&limit=$limite&token=" . getenv('BRAPI_API_EXAMPLE');

        // Faz a requisição à API
        $response = Http::get($request);

        // Verifica se a resposta foi bem-sucedida
        if ($response->successful()) {
            $stocks = $response->json()['stocks'];


            // Retorna a lista de ações filtradas
            return $stocks;
        }

        // Retorna um array vazio em caso de erro
        return [];
    }

    public static function buscarFii($limite)
{
    // Constrói a URL da requisição para buscar ações com base no tipo "fund"
    $request = getenv('BRAPI_API_URL') . "quote/list?type=fund&sortOrder=desc&limit=$limite&token=" . getenv('BRAPI_API_EXAMPLE');

    // Faz a requisição à API
    $response = Http::get($request);

    // Verifica se a resposta foi bem-sucedida
    if ($response->successful()) {
        // Pega a lista de fundos
        $funds = $response->json()['stocks'];

        // Filtra apenas os que possuem "FII" no nome
        $fiiFunds = array_filter($funds, function ($fund) {
            return strpos($fund['name'], 'FII') !== false;
        });

        // Retorna a lista de fundos imobiliários filtrados
        return $fiiFunds;
    }

    // Retorna um array vazio em caso de erro
    return [];
}


}