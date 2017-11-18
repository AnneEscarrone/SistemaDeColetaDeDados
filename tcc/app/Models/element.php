<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class element extends Model {

    private $id;
    private $posicaoLeft;
    private $posicaoTop;
    private $idHtml;
    private $url;
    private $tipo;
    private $focus;
    private $texto;   
    public $timestamps = false;
    protected $fillable = ['posicao_top', 'posicao_left', 'id_element', 'url', 'tipo_elemento', 'focus', 'texto'];

    public function __construct() {
        
    }

    public function getPosicaoLeft() {
        return $this->posicaoLeft;
    }

    public function getPosicaoTop() {
        return $this->posicaoTop;
    }

    public function getId() {
        return $this->id;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getIdHtml() {
        return $this->idHtml;
    }

    public function getFocus() {
        return $this->focus;
    }   

    public function getTexto() {
        return $this->texto;
    }

    public function setPosicaoLeft($posicaoLeft) {
        $this->posicaoLeft = $posicaoLeft;
    }

    public function setPosicaoTop($posicaoTop) {
        $this->posicaoTop = $posicaoTop;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setIdHtml($idHtml) {
        $this->idHtml = $idHtml;
    }

    public function setFocus($focus) {
        $this->focus = $focus;
    }
  

    public function setTexto($texto) {
        $this->texto = $texto;
    }

}
