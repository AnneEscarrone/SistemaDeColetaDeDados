<?php

namespace App\Repositories;

use DebugBar;
use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Support\Facades\DB;

class RepositoryEvent implements RepositoryInterface {

    public function inserir($evento) {

        $id = DB::table('events')->insertGetId(
                ['url' => $evento->getUrl(), 'duracao' => $evento->getDuracao(), 'id_teclado' => $evento->getTeclado(), 'id_mouse' => $evento->getMouse(), 'id_sessao' => $evento->getSessao(), 'id_elemento' => $evento->getElemento()]
        );
        return $id;
    }    

    public function retornaTeclasPressionadas($sessao) {
        $teclas = DB::table('events')
                ->where('id_sessao', $sessao)
                ->join('keyboards', 'events.id_teclado', '=', 'keyboards.id')
                ->select('keyboards.tecla')
                ->get();
        return $teclas;
    }

    public function retornaPosicaoTopElemento($sessao) {
        $elementos = DB::table('events')
                ->where('id_sessao', $sessao)
                ->join('elements', 'events.id_elemento', '=', 'elements.id')
                ->select('elements.posicao_top')
                 ->get();
        return $elementos;
    }

    public function retornaPosicaoLeftElemento($sessao) {
        $elementos = DB::table('events')
                ->where('id_sessao', $sessao)
                ->join('elements', 'events.id_elemento', '=', 'elements.id')
                ->select('elements.posicao_left')
                ->get();
        return $elementos;
    }

    public function retornarPosicaoTopCliqueNaTela($sessao) {
        $posicaoCLique = DB::table('events')
                ->where('id_sessao', $sessao)
                ->join('mouses', 'events.id_mouse', '=', 'mouses.id')
                ->select('mouses.posicaoTop')
                 ->get();
                
        return $posicaoCLique;
    }

    public function retornarPosicaoLeftCliqueNaTela($sessao) {
        $posicaoCLique = DB::table('events')
                ->where('id_sessao', $sessao)
                ->join('mouses', 'events.id_mouse', '=', 'mouses.id')
                ->select('mouses.posicaoLeft')
                ->get();
        return $posicaoCLique;
    }

}
