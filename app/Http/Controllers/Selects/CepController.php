<?php

namespace App\Http\Controllers\selects;

use App\Http\Controllers\Controller;
use App\Services\CepServices;

class CepController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($cep, CepServices $cepServices)
    {
        return $cepServices->consultar($cep);
    }
}
