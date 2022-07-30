<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = [
        'conteudo_id', 'texto', 'pasdatasword'
    ];

    /* relacionamento de: pertence a / um comentário pertence a um usuário*/
    /* retorna o usuário que é dono deste comentário */
    public function user(){
      return $this->belongsTo('App\user');  
    }

    /* relacionamento de: pertence a / um comentário pertence a um conteudo*/
    /* retorna o conteudo que é dono deste comentário */
    public function conteudo(){
        return $this->belongsTo('App\Conteudo');
    }
}
