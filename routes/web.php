<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true, 'register' => false]);

Route::group(['middleware'=>['auth',]], function(){


Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home/Alterado',['as'=>'alterou.senha','uses'=>'HomeController@alterar_senha']);

//=========
//VERIFICA SE O USUÁRIO ESTA ATIVO
//=========
Route::get('/out',['as'=>'teste.ativo','uses'=>'UsuarioController@auth_dev']);
//=========
//CADASTROS
//=========

//SAFRA
Route::get('/Safra',['as'=>'safra.inicio','uses'=>'SafraController@index']);
Route::get('/Safra/Cadastrar',['as'=>'safra.create','uses'=>'SafraController@create']);
Route::post('/Safra/Cadastrar/salvar',['as'=>'safra.store','uses'=>'SafraController@store']);
Route::get('/Safra/Cadastrar/finalizar/{id}',['as'=>'safra.finaliza','uses'=>'SafraController@edit']);
Route::get('/Safra/Cadastrar/reabrir/{id}',['as'=>'safra.reabrir','uses'=>'SafraController@reabrir']);

//LOCAL
Route::get('/Local',['as'=>'local.inicio','uses'=>'LocalController@index']);
Route::get('/Local/Cadastrar',['as'=>'local.create','uses'=>'LocalController@create']);
Route::post('/Local/Cadastrar/salvar',['as'=>'local.store','uses'=>'LocalController@store']);
Route::post('/Local/Cadastrar/editar',['as'=>'local.store','uses'=>'LocalController@update']);
Route::get('/Local/Cadastrar/apagar/{id}',['as'=>'local.apagar','uses'=>'LocalController@destroy']);
Route::get('/Local/Cadastrar/editar/{id}',['as'=>'local.editar','uses'=>'LocalController@edit']);

//Funcionario
Route::get('/Funcionario',['as'=>'funcionario.inicio','uses'=>'FuncionarioController@index']);
Route::get('/Funcionario/Cadastrar',['as'=>'funcionario.create','uses'=>'FuncionarioController@create']);
Route::post('/Funcionario/Cadastrar/salvar',['as'=>'funcionario.store','uses'=>'FuncionarioController@store']);
Route::get('/Funcionario/demitir/{id}',['as'=>'funcionario.demitir','uses'=>'FuncionarioController@demitir']);
Route::get('/Funcionario/editar/{id}',['as'=>'funcionario.edit','uses'=>'FuncionarioController@edit']);
Route::get('/Funcionario/readmitir/{id}',['as'=>'funcionario.readmitir','uses'=>'FuncionarioController@readmitir']);
Route::post('/Funcionario/editar/salvar',['as'=>'funcionario.update','uses'=>'FuncionarioController@update']);

//Atividade
Route::get('/Atividade',['as'=>'atividade.inicio','uses'=>'AtividadeController@index']);
Route::get('/Atividade/Cadastrar',['as'=>'atividade.create','uses'=>'AtividadeController@create']);
Route::post('/Atividade/Cadastrar/salvar',['as'=>'atividade.store','uses'=>'AtividadeController@store']);
Route::get('/Atividade/editar/{id}',['as'=>'atividade.edit','uses'=>'AtividadeController@edit']);
Route::post('/Atividade/editar/salvar',['as'=>'atividade.update','uses'=>'AtividadeController@update']);
Route::get('/Atividade/excluir/{id}',['as'=>'atividade.excluir','uses'=>'AtividadeController@destroy']);

//Metas
Route::get('/Metas',['as'=>'metas.inicio','uses'=>'MetasController@index']);
Route::get('/Metas/safra/atual',['as'=>'metas.safra.atual','uses'=>'MetasController@safra_atual']);
Route::get('/Metas/Cadastrar',['as'=>'metas.create','uses'=>'MetasController@create']);
Route::post('/Metas/Cadastrar',['as'=>'metas.store','uses'=>'MetasController@store']);
Route::post('/Metas/Editar/Salvar',['as'=>'metas.update','uses'=>'MetasController@update']);
Route::get('/Metas/Editar/{id}',['as'=>'metas.editar','uses'=>'MetasController@edit']);

//Apontamentos
Route::get('/Apontamento',['as'=>'apontamento.inicio','uses'=>'ApontamentoController@index']);
Route::get('/Apontamento/novo/{id}',['as'=>'apontamento.create','uses'=>'ApontamentoController@create']);
Route::get('/Apontamento/reapontar/{id}',['as'=>'apontamento.reapontar','uses'=>'ApontamentoController@reapontar']);
Route::post('/Apontamento',['as'=>'apontamento.store','uses'=>'ApontamentoController@store']);
Route::post('/Apontamento/reapontar',['as'=>'apontamento.reapontar.store','uses'=>'ApontamentoController@reapontar_store']);

Route::group(['middleware' => ['tipo.user']], function() {
	//Usuário
	Route::get('/Usuario',['as'=>'usuario.inicio','uses'=>'UsuarioController@index']);
	Route::get('/Usuario/editar/{id}',['as'=>'usuario.edit','uses'=>'UsuarioController@edit']);
	Route::get('/Usuario/Ativa/{id}',['as'=>'usuario.ativa','uses'=>'UsuarioController@user_desativar']);
	Route::get('/Usuario/GeraSenha/{id}',['as'=>'usuario.gerasenha','uses'=>'UsuarioController@gerar_senha']);
	Route::get('/Usuario/novo',['as'=>'usuario.create','uses'=>'UsuarioController@create']);
	Route::post('/Usuario/novo',['as'=>'usuario.store','uses'=>'UsuarioController@store']);

});

});