<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

use App\Models\Acao;

class AcaoControler extends Controller
{
    public function show($symbol)
    {
        $acao = Acao::buscarDadosAcao($symbol);

        return view('acao.infoPage', compact('acao'));
    }

    public function dashboard()
    {
        // Faz as três requisições simultâneas para buscar os diferentes dados
        $acoes = Acao::buscarAcoesMarketCap(60); // Ações normais
        $bdrs = Acao::buscarBdrMarketCap(60);   // BDRs

        // Retorna a view 'dashboard' passando os dados de cada tipo
        return view('dashboard', [
            'acoes' => $acoes,  // Ações normais
            'bdrs' => $bdrs,    // BDRs
        ]);
    }


    // public function dashboard()
    // {
    //     // Chama a função buscarAcoesMarketCap para obter as ações
    //     $acoes = Acao::buscarAcoesMarketCap(60);

    //     // Retorna a view 'dashboard' com os dados das ações
    //     return view('dashboard', ['acoes' => $acoes]);
    // }
          
}
