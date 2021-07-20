<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    use HasFactory;

    protected $table = 'saldo';

    protected  $fillable = ['valor', 'empresa_id'];


    public function movimento()
    {
        return  $this->morphTo();
    }

    public static function ultimoDaEmpresa(int $empresa_id)
    {
        return self::where('empresa_id', $empresa_id)
            ->latest()
            ->first();
    }
    /**
     * Busca os saldos da empresa por intervalo
     *
     * @param integer $empresa
     * @param string $inicio
     * @param string $fim
     * @return void
     */
    public static function buscaPorIntervalo(int $empresa, string $inicio, string $fim)
    {
        return self::with('movimento')
            ->whereBetween('created_at', [$inicio, $fim])
            ->where('empresa_id', $empresa)
            ->get();
    }
}
