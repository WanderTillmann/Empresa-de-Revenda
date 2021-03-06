<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'produtos';

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
    protected $fillable = ['nome', 'descricao'];

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
     *  Cria  acessor chamado text para serializacao
     *
     * @return string
     */
    public function getTextAttribute(): string
    {
        return $this->attributes['nome'];
    }

    /**
     * Busca produto por nome
     *
     * @param string $nome
     * @return void
     */
    public static function buscarPorNome(string $nome)
    {
        $nome = '%' . $nome . '%';
        return self::where('nome', "LIKE", $nome)->get();
    }
}
