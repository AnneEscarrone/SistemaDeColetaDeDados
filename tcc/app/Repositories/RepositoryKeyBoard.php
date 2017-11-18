<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Support\Facades\DB;

class RepositoryKeyBoard implements RepositoryInterface {

    public function inserir($keyBoard) {
        $id = DB::table('keyboards')->insertGetId(
                ['tecla' => $keyBoard->getTecla(), 'keyCode' =>$keyBoard->getKeyCode()]
        );       
        return $id;
    }
       

}
