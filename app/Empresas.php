<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Empresas extends Model
{
    protected $table ="empresas";

    static public function listaEmpresas(){
        $consulta = DB::table('empresas')->select('id', 'nome')->get();

        return $consulta;
    }
}
