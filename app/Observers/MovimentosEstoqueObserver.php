<?php

namespace App\Observers;

use App\Models\Empresa;
use App\Models\MovimentosEstoque;
use App\Models\Saldo;
use Illuminate\Support\Facades\DB;

class MovimentosEstoqueObserver
{
    /**
     * Handle the MovimentosEstoque "created" event.
     *
     * @param  \App\Models\MovimentosEstoque  $movimentosEstoque
     * @return void
     */
    public function created(MovimentosEstoque $movimentosEstoque)
    {
        $saldo = Saldo::ultimoDaEmpresa($movimentosEstoque->empresa_id);
        $valorSaldo = $saldo->valor ?? 0;
        $movimentosEstoque->saldo()->create(
            [
                'valor' => $valorSaldo + ($movimentosEstoque->quantidade * $movimentosEstoque->valor),
                'empresa_id' => $movimentosEstoque->empresa_id
            ]
        );
    }

    /**
     * Handle the MovimentosEstoque "updated" event.
     *
     * @param  \App\Models\MovimentosEstoque  $movimentosEstoque
     * @return void
     */
    public function updated(MovimentosEstoque $movimentosEstoque)
    {
        //
    }

    /**
     * Handle the MovimentosEstoque "deleted" event.
     *
     * @param  \App\Models\MovimentosEstoque  $movimentosEstoque
     * @return void
     */
    public function deleted(MovimentosEstoque $movimentosEstoque)
    {
        $saldo = $movimentosEstoque->saldo;
        $valorMovimento = $movimentosEstoque->quantidade * $movimentosEstoque->valor;

        Saldo::where('created_at', '>', $saldo->created_at)->update([
            'valor' => DB::raw("valor - $valorMovimento")
        ]);

        $saldo->delete();
    }

    /**
     * Handle the MovimentosEstoque "restored" event.
     *
     * @param  \App\Models\MovimentosEstoque  $movimentosEstoque
     * @return void
     */
    public function restored(MovimentosEstoque $movimentosEstoque)
    {
        //
    }

    /**
     * Handle the MovimentosEstoque "force deleted" event.
     *
     * @param  \App\Models\MovimentosEstoque  $movimentosEstoque
     * @return void
     */
    public function forceDeleted(MovimentosEstoque $movimentosEstoque)
    {
        //
    }
}
