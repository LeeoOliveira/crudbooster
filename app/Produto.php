<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produto extends Model
{

   public function atualiza(int $id, array $dados){
    $query = DB::table('produtos')
            ->where('id', $id)
            ->update(['nome' => $dados['nome'], 'descricao' => $dados['descricao'], 'preco' => $dados['preco'], 'id_categorias' => $dados['id_categorias']]);

    if($query){
        return 1;
    }else{
        return 0;
    }
    
    }


}



