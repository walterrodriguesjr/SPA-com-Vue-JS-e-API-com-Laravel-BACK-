<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'imagem'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /* relacionamento de: um para muitos / um usuário terá muitos comentários */
    /* retorna os comentários que este usuário fez */
    public function comentarios(){
        return $this->hasMany('App\Comentario');
    }

     /* relacionamento de: um para muitos / um usuário terá muitos conteudos */
    /* retorna os conteudos que este usuário tem */
    public function conteudos(){
        return $this->hasMany('App\Conteudo');
    }

    /* relacionamento de: pertence a muitos/ muitos para muitos / muitos usuários deram muitas curtidas */
    /* retorna as curtidas que o usuário já deu */
    public function curtidas(){
        return $this->belongsToMany('App\Conteudo', 'curtidas', 'user_id', 'conteudo_id');
    }

    /* relacionamento de: pertence a muitos/ muitos para muitos / muitos usuários tem muitos amigos */
    /* retorna todos os amigos*/
    public function amigos(){
        return $this->belongsToMany('App\User', 'amigos', 'user_id', 'amigo_id');
    }
}
