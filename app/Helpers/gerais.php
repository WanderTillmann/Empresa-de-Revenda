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

if (!function_exists('data_iso')) {
    function data_iso($data)
    {
        return \DateTime::createFromFormat('d/m/Y', $data)->format('Y-m-d');
    }
}

if (!function_exists('date_br')) {
    function data_br($data)
    {
        return (new DateTime($data))->format('d/m/Y');
    }
}
if (!function_exists('numero_br')) {
    function numero_br($valor)
    {
        return number_format($valor, '2', ',', '.');
    }
}
if (!function_exists('numero_iso')) {
    function numero_iso($data)
    {
        return str_replace(['.', ','], ['', '.'], $data);
    }
}
