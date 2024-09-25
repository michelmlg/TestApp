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

    public function dashboard(){
        // Aqui você chama a função buscaTopAcoes para obter as ações
        $response = $this->buscarTopAcoes(25);

        $content = $response->getContent();

        $data = json_decode($content, true); 

        // Retorna a view 'dashboard' com os dados das ações
        return view('dashboard', ['acoes' => $data]);
    }

    private function buscarDadosAcao($ticker)
    {   
        // Chamada à API para buscar os detalhes da ação usando o símbolo
        $response = Http::get(getenv('BRAPI_API_URL') . "quote/{$ticker}?token=" . getenv('BRAPI_API_TOKEN'));

        if ($response->successful()) {
            $data = $response->json();

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
    private function buscarTopAcoes($quantidade){
        
        $request = getenv('BRAPI_API_URL') . "quote/list?type=stock&sortBy=market_cap_basic&sortOrder=desc&limit=$quantidade&token=" . getenv('BRAPI_API_EXAMPLE');

        $response = Http::get($request);

         // Verifica se a requisição foi bem-sucedida
        if ($response->successful()) {
        // Converte o JSON para array associativo
        $data = $response->json();
        
        // Acessa o array de 'stocks'
        $stocks = $data['stocks'];
        
        // Retorna ou processa os 'stocks' conforme necessário
        return response()->json($stocks);
        } else {
        // Caso haja algum erro, retorna uma resposta de erro
        return response()->json(['error' => 'Unable to fetch stocks data'], 500);
        }

    }


           
}
