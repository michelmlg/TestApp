<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

use App\Models\Acao;

class AcaoControler extends Controller
{
    public function show($symbol)
    {
        $ativo = Acao::buscarDadosAtivo($symbol);

        return view('web.ativo.infoPage', compact('ativo'));
    }

    public function dashboard()
    {
        // Faz as três requisições simultâneas para buscar os diferentes dados
        $acoes = Acao::buscarAcoesMarketCap(60); // Ações normais
        $bdrs = Acao::buscarBdrMarketCap(30);   // BDRs
        $fiis = Acao::buscarFii(90);

        // Retorna a view 'dashboard' passando os dados de cada tipo
        return view('web.dashboard', [
            'acoes' => $acoes,  // Ações normais
            'bdrs' => $bdrs,    // BDRs
            'fiis' => $fiis,
        ]);
    }
          
}
