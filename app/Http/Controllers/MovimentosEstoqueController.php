<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovimentoEstoqueRequest;
use App\Models\MovimentosEstoque;
use Illuminate\Http\Request;

class MovimentosEstoqueController extends Controller
{

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
