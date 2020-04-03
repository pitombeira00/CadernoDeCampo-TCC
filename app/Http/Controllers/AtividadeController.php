<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\atividade;
use Illuminate\Support\Facades\DB;

class AtividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = db::table('atividade')
          ->where('apagada','=','0')
          ->get();

        
        return view('cadastro.atividade.home', compact('dados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cadastro.atividade.create');
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

        $salvar = new atividade();

        $salvar->descricao  = $dados['descricao'];
        $salvar->medicao    = $dados['tipo_medicao'];
        $salvar->tipo       = $dados['tipo_atividade'];
        $salvar->apagada    = '0';

        $salvar->save();

         \Session::flash('mensagem',['msg'=>' '.$dados['descricao'].' criada com SUCESSO']);
        
        return redirect()->route('atividade.inicio');

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
        $dados = atividade::find($id);

        if ($dados->apagada == '1') {
             return redirect()->route('atividade.inicio');
        }
        return view('cadastro.atividade.edit', compact('dados'));
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


        $salvar = atividade::find($dados['id']);


        $salvar->descricao  = $dados['descricao'];
        $salvar->medicao    = $dados['tipo_medicao'];
        $salvar->tipo       = $dados['tipo_atividade'];
        
        $salvar->save();

         \Session::flash('mensagem',['msg'=>'Atualização realizada com SUCESSO']);
        
        return redirect()->route('atividade.inicio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dados = atividade::find($id);

        $dados->apagada = '1';

        $dados->save();

        \Session::flash('mensagem',['msg'=>'Atividade DELETADA']);

        return redirect()->route('atividade.inicio');
    }
}
