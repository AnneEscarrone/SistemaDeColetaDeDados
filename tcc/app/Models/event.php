<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class event extends Model {

    private $id;
    private $url;
    private $duracao;
    private $teclado;
    private $mouse;
    private $elemento;
    private $sessao;
    public $timestamps = false;
    protected $fillable = ['url', 'duracao', 'id_teclado', 'id_mouse', 'id_sessao', 'id_elemento'];

    public function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getDuracao() {
        return $this->duracao;
    }

    public function getTeclado() {
        return $this->teclado;
    }

    public function getMouse() {
        return $this->mouse;
    }

    public function getElemento() {
        return $this->elemento;
    }

    public function getSessao() {
        return $this->sessao;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function setDuracao($duracao) {
        $this->duracao = $duracao;
    }

    public function setTeclado($teclado) {
        $this->teclado = $teclado;
    }

    public function setMouse($mouse) {
        $this->mouse = $mouse;
    }

    public function setElemento($elemento) {
        $this->elemento = $elemento;
    }

    public function setSessao($sessao) {
        $this->sessao = $sessao;
    }

}
