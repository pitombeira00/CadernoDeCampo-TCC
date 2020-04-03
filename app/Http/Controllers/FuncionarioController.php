<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\funcionario; 
class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = funcionario::all();

        return view('cadastro.funcionario.home',compact('dados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('cadastro.funcionario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();

        $registro = new funcionario();
        
        $registro->nome          = $dados['nome'];
        $registro->cargo         = $dados['cargo'];
        $registro->demitido      = '0';
        
        $registro->save();
        
        \Session::flash('mensagem',['msg'=>'Funcionario '.$dados['nome'].' Cadastrado com Sucesso']);
        
        return redirect()->route('funcionario.inicio');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = funcionario::find($id);
        
     
        return view('cadastro.funcionario.edit',compact('dados'));
    }

    public function readmitir($id)
    {
        $dados = funcionario::find($id);
        
        $dados->demitido  = '0';
        
        $dados->save();
        \Session::flash('mensagem',['msg'=>'Funcionário Readmitido']);
        return redirect()->route('funcionario.inicio');
    }

    public function demitir($id)
    {
        $salvar = funcionario::find($id);
        
        $salvar->demitido  = '1';
        
        $salvar->save();

        \Session::flash('mensagem',['msg'=>'Funcionário demitido']);

        return redirect()->route('funcionario.inicio');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $dados = $request->all();

        $salvar = funcionario::find($dados['id']);

        $salvar->nome = $dados['nome'];
        $salvar->cargo = $dados['cargo'];

        $salvar->save();

        \Session::flash('mensagem',['msg'=>'Funcionário Editado com SUCESSO']);

        return redirect()->route('funcionario.inicio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
