<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Support\Facades\DB;

class RepositoryMouse implements RepositoryInterface {

    public function inserir($mouse) {


        $id = DB::table('mouses')->insertGetId(
                ['posicaoLeft' => $mouse->getPosicaoLeft(), 'posicaoTop' =>$mouse->getPosicaoTop(),'botaoMouse' => $mouse->getBotaoMouse()]
        );       
        return $id;
    }
       

}
