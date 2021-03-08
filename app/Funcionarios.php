<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Funcionarios extends Model
{  
    protected $table = "funcionarios";

    protected $fillable = ['nome', 'email', 'endereco', 'idade', 'nascimento', 'salario', 'observacao', 'id_cargo','id_empresa', 'id_cidade', 'id_status'];

    // public function cadastraFuncionario($dados){
    //     $consulta = DB::table('funcionarios')->a;
    // }
}
