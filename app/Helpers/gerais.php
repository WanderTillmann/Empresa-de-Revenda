<?php

if (!function_exists('mascara')) {
    function mascara($val, $mascara)
    {
        $mascarado = '';
        $k = 0;

        for ($i = 0; $i <= strlen($mascara) - 1; $i++) {
            if ($mascara[$i] == '#') {
                if (isset($val[$k])) {
                    $mascarado .= $val[$k++];
                }
            } else {
                if (isset($mascara[$i])) {
                    $mascarado .= $mascara[$i];
                }
            }
        }
        return $mascarado;
    }
}


if (!function_exists('estados')) {
    function estados()
    {
        return [
            'AC' => 'Acre',
            'AL' => 'Alagoas',
            'AP' => "Amapá",
            'AM' => 'Amazonas',
            'BA' => 'Bahia',
            'CE' => 'Ceará',
            'DF' => 'Distrito Federal',
            'ES' => 'Espirito Santo',
            'GO' => 'Goias',
            'MA' => 'Maranhão',
            'MT' => 'Mato Grosso',
            'MS' => 'Mato Grosso do sul',
            'MG' => 'Minas Gerais',
            'PA' => 'Pará',
            'PB' => 'Paraíba',
            'PR' => 'Paraná',
            'PE' => 'Pernanbuco',
            'PI' => 'Piauí',
            'RR' => 'Roraima',
            'RO' => 'Rondonia',
            'RJ' => 'Rio de Janeiro',
            'RN' => 'Rio Grande do Norte',
            'RS' => 'Rio Grande do Sul',
            'SC' => 'Santa Catarina',
            'SP' => 'Sāo Paulo',
            'SE' => 'Sergipe',
            'TO' => 'Tocantins',
        ];
    }
}
