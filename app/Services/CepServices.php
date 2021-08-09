<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CepServices
{
    public function consultar(string $cep)
    {
        $response = Http::get(
            "https://webmaniabr.com/api/1/cep/{$cep}/?app_key=r6HsE9edaoqNAR7VTRACws1PHqUJpGqP&app_secret=lnEQtMMh15lPhD3wZS5LHPCo9T75cBU0oiEKVC4qw4XjoVSA"
        );

        return $response->json();
    }


    public static function ValidarCep(String $cep)
    {
        $response = Http::get(
            "https://webmaniabr.com/api/1/cep/{$cep}/?app_key=r6HsE9edaoqNAR7VTRACws1PHqUJpGqP&app_secret=lnEQtMMh15lPhD3wZS5LHPCo9T75cBU0oiEKVC4qw4XjoVSA"
        );
        $endereco = $response->json();
        return !isset($endereco['error']);
    }
}
