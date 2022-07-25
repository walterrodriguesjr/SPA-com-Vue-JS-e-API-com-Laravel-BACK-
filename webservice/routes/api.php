<?php

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

/* ROTA DE CADASTRO DE USUÁRIO */
Route::post('/cadastro', function (Request $request) {
    $data = $request->all();
    $validacao = Validator::make($data, [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    /* CONDICIONAL DE VALIDAÇÃO E RETORNO DE ERRO AO USUÁRIO */
    if($validacao->fails()){
        return $validacao->errors();
    }

    /* MÉTODO DE CRIAÇÃO DO USUÁRIO */
    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
    ]);
    $user->token = $user->createToken($user->email)->accessToken;
    return $user;
});

/* ROTA DE LOGIN */
Route::post('/login', function (Request $request) {
    $data = $request->all();
    $validacao = Validator::make($data, [
        'email' => 'required|string|email|max:255',
        'password' => 'required|string',
    ]);

    /* CONDICIONAL DE VALIDAÇÃO E RETORNO DE ERRO AO USUÁRIO */
    if($validacao->fails()){
        return $validacao->errors();
    }

    /* MÉTODO DE CRIAÇÃO DO USUÁRIO */
    if(Auth::attempt(['email'=>$data['email'], 'password'=>$data['password']])){
       $user = auth()->user(); 
       $user->token = $user->createToken($user->email)->accessToken;
       return $user;
    }else{
        return ['status'=>false];
    }
});

Route::middleware('auth:api')->get('/usuario', function (Request $request) {
    return $request->user();
});
