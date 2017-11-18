<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Support\Facades\DB;

class RepositoryElement implements RepositoryInterface {

    public function inserir($elemento) {
        $id = DB::table('elements')->insertGetId(
                ['posicao_top' => $elemento->getPosicaoTop(), 'posicao_left' => $elemento->getPosicaoLeft(), 'id_element' => $elemento->getIdHtml()
                    , 'url' => $elemento->getUrl(), 'tipo_elemento' => $elemento->getTipo(), 'focus_elemento'=> $elemento->getFocus(),'texto'=> $elemento->getTexto()]
        );        
        return $id;
    }

}
