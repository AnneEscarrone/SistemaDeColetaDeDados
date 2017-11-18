<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class keyboard extends Model {

    private $id;
    private $tecla;
    private $keyCode;    
    public $timestamps = false;
    protected $fillable = ['tecla', 'keyCode'];

    public function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function getTecla() {
        return $this->tecla;
    }

    public function getKeyCode() {
        return $this->keyCode;
    }   

    public function setId($id) {
        $this->id = $id;
    }

    public function setTecla($tecla) {
        $this->tecla = $tecla;
    }

    public function setKeyCode($keyCode) {
        $this->keyCode = $keyCode;
    }  

}
