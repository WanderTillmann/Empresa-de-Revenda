<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovimentoEstoqueRequest;
use App\Models\MovimentosEstoque;
use Illuminate\Http\Request;

class MovimentosEstoqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovimentoEstoqueRequest $request)
    {
        MovimentosEstoque::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MovimentosEstoque  $movimentosEstoque
     * @return \Illuminate\Http\Response
     */
    public function show(MovimentosEstoque $movimentosEstoque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MovimentosEstoque  $movimentosEstoque
     * @return \Illuminate\Http\Response
     */
    public function edit(MovimentosEstoque $movimentosEstoque)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MovimentosEstoque  $movimentosEstoque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MovimentosEstoque $movimentosEstoque)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MovimentosEstoque  $movimentosEstoque
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MovimentosEstoque::destroy($id);
        return redirect()->back();
    }
}
