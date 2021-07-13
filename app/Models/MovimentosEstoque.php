<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class MovimentosEstoque extends Model
{
    use HasFactory;

    /**
     * Define o nome da tabela
     *
     * @var string
     */
    protected $table = 'movimentos_estoque';


    /**
     * campos permitidos em definicao de dados em massa
     *
     * @var array
     */
    protected $fillable = ['tipo', 'quantidade', 'valor',  'empresa_id', 'produto_id'];
    /**
     * Get the empresa that owns the MovimentosEstoque
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class);
    }

    /**
     * Get the produto that owns the MovimentosEstoque
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }

    /**
     * Configura a Relacao com historico do saldo
     *
     * @return MorphOne
     */
    public function saldo(): MorphOne
    {
        return $this->morphOne(Saldo::class, 'movimento');
    }
}
