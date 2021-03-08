<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table ="cargos";

    static public function listaCargos(){
        $consulta = Cargo::all();

        return $consulta;
    }
    
}
