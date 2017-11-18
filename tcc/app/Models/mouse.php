<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mouse extends Model {

    private $id;
    private $posicaoLeft;
    private $posicaoTop;
    private $botaoMouse;    
    public $timestamps = false;
    protected $fillable = ['posicao_top', 'posicao_left', 'botaoMouse'];

    public function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function getPosicaoLeft() {
        return $this->posicaoLeft;
    }

    public function getPosicaoTop() {
        return $this->posicaoTop;
    }

    public function getBotaoMouse() {
        return $this->botaoMouse;
    }


    public function setId($id) {
        $this->id = $id;
    }

    public function setPosicaoLeft($posicaoLeft) {
        $this->posicaoLeft = $posicaoLeft;
    }

    public function setPosicaoTop($posicaoTop) {
        $this->posicaoTop = $posicaoTop;
    }

    public function setBotaoMouse($botaoMouse) {
        $this->botaoMouse = $botaoMouse;
    }

}
