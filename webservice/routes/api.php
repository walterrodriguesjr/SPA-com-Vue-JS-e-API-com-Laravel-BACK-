<?php



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\User;
use App\Conteudo;
use App\Comentario;

Route::post('/cadastro', "UsuarioController@cadastro"); 
Route::post('/login', "UsuarioController@login"); 
Route::middleware('auth:api')->put('/perfil', "UsuarioController@perfil");

/* rota de testes */
Route::get('/testes', function() {
    
    $user = User::find(1);
    $user2 = User::find(2);
    /* $user->conteudos()->create([
        'titulo' => 'Conteudo 1',
        'texto' => 'asushaushsaudhufhudfhd',
        'imagem' => 'URL da imagem',
        'link' => 'Link',
        'data' => '218-05-10'
    ]);
    return $user->conteudos; */

    /* método para adicionar amigo */
    /* $user->amigos()->attach($user2->id); */

    /* método para remover amigo */
    /* $user->amigos()->detach($user2->id); */

    /* método para que, se não for amigo adiciona, se for, remove */
    /* $user->amigos()->toggle($user2->id); */


    return $user->amigos;


    
});