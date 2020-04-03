<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\local;
use Illuminate\Support\Facades\DB;
class LocalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $dados = db::table('local')
      ->where('apagada','=','0')
      ->get();

      
        return view('cadastro.local.home',compact('dados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cadastro.local.create');
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

        $registro = new local();
        
        $registro->descricao    = $dados['descricao'];
        $registro->apagada     = '0';
        
        $registro->save();
        
        \Session::flash('mensagem',['msg'=>' '.$dados['descricao'].' criado com Sucesso']);
        
        return redirect()->route('local.inicio');
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
        $dados = local::find($id);
      
        return view('cadastro.local.edit',compact('dados'));
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

        //EDITAR 
        if (isset($dados['id'])) {
            $registro = local::find($dados['id']);
        
            $registro->descricao    = $dados['descricao'];
            $registro->apagada     = '0';
            
            $registro->save();
            
            \Session::flash('mensagem',['msg'=>' '.$dados['descricao'].' Editado com Sucesso']);
            
            return redirect()->route('local.inicio');  
        }else {
        
            //----------------------------
            //SALVAR REGISTRO
            //----------------------------
        $registro = new local();
        
        $registro->descricao    = $dados['descricao'];
        $registro->apagada     = '0';
        
        $registro->save();
        
        \Session::flash('mensagem',['msg'=>' '.$dados['descricao'].' Criado com Sucesso']);
        
        return redirect()->route('local.inicio');
        }
        
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salvar = local::find($id);
        
        $salvar->apagada  = '1';
        
        $salvar->save();

        \Session::flash('mensagem',['msg'=>'Local apagado']);

        return redirect()->route('local.inicio');

    }
}
