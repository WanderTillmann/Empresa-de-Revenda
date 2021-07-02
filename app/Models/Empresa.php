<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pagination\AbstractPaginator;

class Empresa extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * the attributes that are mass assigment
     *
     * @var array
     */
    protected $fillable = [
        'tipo',
        'nome', 'razao_social', 'documento', 'bairro',
        'ie_rg', 'nome_contato', 'celular', 'email',
        'telefone', 'cep', 'logradouro', 'cidade', 'estado', 'observacao'
    ];

    /**
     * retorna  empresas por tipo
     *
     * @param String $tipo
     * @param integer $qtd
     * @return AbstractPaginator
     */
    public static function todasPorTipo(String $tipo, int $qtd = 10): AbstractPaginator
    {
        return self::where('tipo', $tipo)->paginate($qtd);
    }
}
