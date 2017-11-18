<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class session extends Model {

    private $id;
    private $ip;
    private $data;
    private $inicio;
    private $fim;
    private $eventos;
    public $timestamps = false;
    protected $fillable = ['data', 'tempo', 'ip'];

    public function __construct() {
        $this->eventos = array();
    }

    public function getId() {
        return $this->id;
    }

    public function getIp() {
        return $this->ip;
    }

    public function getData() {
        return $this->data;
    }

    public function getInicio() {
        return $this->inicio;
    }

    public function getFim() {
        return $this->fim;
    }

    public function getEventos() {
        return $this->eventos;
    }

    public function setIp($ip) {
        $this->ip = $ip;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setInicio($inicio) {
        $this->inicio = $inicio;
    }

    public function setFim($fim) {
        $this->fim = $fim;
    }

    public function setEventos($eventos) {
        $this->eventos = $eventos;
    }

    public function addEvento($evento) {
        $this->eventos[] = $evento;
    }

}
