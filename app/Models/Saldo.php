<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    use HasFactory;

    protected $table = 'saldo';

    protected  $fillable = ['valor', 'empresa_id'];

    public static function ultimoDaEmpresa(int $empresa_id)
    {
        return self::where('empresa_id', $empresa_id)
            ->latest()
            ->first();
    }
}
