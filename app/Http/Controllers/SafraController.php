<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\safra;

class SafraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Safra::all();
        return view('cadastro.safra.home',compact('dados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cadastro.safra.create');
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

        $registro = new safra();
        
        $registro->descricao    = $dados['safra'];
        $registro->terminou     = '0';
        
        $registro->save();
        
        \Session::flash('mensagem',['msg'=>'Safra Iniciada com Sucesso']);
        
        return redirect()->route('safra.inicio');
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
    
        $salvar = Safra::find($id);
        
        $salvar->terminou  = '1';
        
        $salvar->save();

        \Session::flash('mensagem',['msg'=>'Safra Finalizada com Sucesso']);

        return redirect()->route('safra.inicio');
    }

     public function reabrir($id)
    {
    
        $salvar = Safra::find($id);
        
        $salvar->terminou  = '0';
        
        $salvar->save();

        \Session::flash('mensagem',['msg'=>'Safra Reaberta com Sucesso']);

        return redirect()->route('safra.inicio');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
