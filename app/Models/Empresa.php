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
     * define dados para serializacao
     *
     * @var array
     */
    protected $visible = ['id', 'text'];

    /**
     * anexa acessores a serializacao
     *
     * @var array
     */
    protected $appends = ['text'];

    /**
     * Define a realacao com estoque
     *
     * @return void
     */
    public function movimentosEstoque()
    {
        return $this->hasMany(MovimentosEstoque::class);
    }

    /**
     * retorna  empresas por tipo
     *
     * @param String $tipo
     * @param integer $qtd
     * @return AbstractPaginator
     */
    public static function todasPorTipo(string $tipo, string $busca, int $qtd = 10): AbstractPaginator
    {
        return self::where('tipo', $tipo)
            ->where(function ($q) use ($busca) {
                $q->orWhere('nome', 'LIKE', "%$busca%")
                    ->orWhere('razao_social', 'LIKE', "%$busca%")
                    ->orWhere('nome_contato', 'LIKE', "%$busca%");
            })->withTrashed()
            ->paginate($qtd);
    }

    /**
     *  Cria  acessor chamado text para serializacao
     *
     * @return string
     */
    public function getTextAttribute(): string
    {
        return sprintf(
            '%s (%s)',
            $this->attributes['nome'],
            $this->attributes['razao_social']
        );
    }

    public static function buscarPorNomeTipo(string $nome, string $tipo)
    {
        $nome = '%' . $nome . '%';
        return self::where('nome', 'LIKE', $nome)->where('tipo', $tipo)->get();
    }

    /**
     * Busca empresa com ID e suas relacoes
     *
     * @param integer $id
     * @return void
     */
    public static function BuscaPorId(int $id)
    {
        return self::with([
            'movimentosEstoque' => function ($query) {
                $query->latest()->take(5);
            },
            'movimentosEstoque.produto' => function ($q) {
                $q->withTrashed();
            }
        ])->findOrFail($id);
    }
}
