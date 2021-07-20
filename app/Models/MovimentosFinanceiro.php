<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class MovimentosFinanceiro extends Model
{
    // use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'movimentos_financeiros';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descricao', 'valor', 'tipo', 'empresa_id'];

    /**
     * Metodo responsavel pela relacao com a empresa
     *
     * @return void
     */
    public function empresa()
    {
        return $this->belongsTo('App\Models\Empresa');
    }

    /**
     * Metodo responsabel pela relacao com saldo
     *
     * @return void
     */
    public function saldo(): MorphOne
    {
        return $this->MorphOne(Saldo::class, 'movimento');
    }

    /**
     * metodo de buscar por intervalo
     *
     * @param string $inicio
     * @param string $fim
     * @param integer $quantidade
     * @return void
     */
    public static function buscaPorIntervalo(string $inicio, string $fim, int $quantidade = 20)
    {
        return self::whereBetween('created_at', [$inicio, $fim])
            ->with(['empresa' => function ($q) {
                $q->withTrashed();
            }])
            ->paginate($quantidade);
    }

    /**
     * Busca movimento por ID e tras empresa excluida
     *
     * @param integer $id
     * @return void
     */
    public static function porIdComEmpresaExcluida(int $id)
    {
        return self::with([
            'empresa'  => function ($q) {
                $q->withTrashed();
            },
        ])->findOrFail($id);
    }
}
