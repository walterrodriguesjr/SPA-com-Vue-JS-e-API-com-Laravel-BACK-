<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conteudo extends Model
{
    protected $fillable = [
        'titulo', 'texto', 'imagem', 'link', 'data'
    ];

    /* relacionamento de: um para muitos / um conteudo terá muitos comentários */
    /* retorna os comentários que este conteudo tem */
    public function comentarios(){
        return $this->hasMany('App\Comentario');
    }

    /* relacionamento de: pertence a / um conteudo pertence a um usuário*/
    /* retorna o conteudo que é dono deste comentário */
    public function user(){
        return $this->belongsTo('App\User');
    }

    /* relacionamento de: pertence a muitos/ muitos para muitos / muitos conteudos tem muitas curtidas */
    /* retorna as curtidas o conteudo teve */
    public function curtidas(){
        return $this->belongsToMany('App\user', 'curtidas', 'conteudo_id', 'user_id');
    }

}

