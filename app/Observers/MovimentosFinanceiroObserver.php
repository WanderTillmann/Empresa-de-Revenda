<?php

namespace App\Observers;

use App\Models\MovimentosFinanceiro;
use App\Models\Saldo;
use Illuminate\Support\Facades\DB;

class MovimentosFinanceiroObserver
{
    /**
     * Handle the MovimentoFinanceiro "created" event.
     *
     * @param  \App\Models\MovimentoFinanceiro  $movimentoFinanceiro
     * @return void
     */
    public function created(MovimentosFinanceiro $movimentoFinanceiro)
    {
        $saldo = Saldo::ultimoDaEmpresa($movimentoFinanceiro->empresa_id);
        $valorSaldo = $saldo->valor ?? 0;
        $movimentoFinanceiro->saldo()->create(
            [
                'valor' => $valorSaldo - ($movimentoFinanceiro->valor),
                'empresa_id' => $movimentoFinanceiro->empresa_id
            ]
        );
    }

    /**
     * Handle the MovimentoFinanceiro "updated" event.
     *
     * @param  \App\Models\MovimentoFinanceiro  $movimentoFinanceiro
     * @return void
     */
    public function updated(MovimentosFinanceiro $movimentoFinanceiro)
    {
        //
    }

    /**
     * Handle the MovimentoFinanceiro "deleted" event.
     *
     * @param  \App\Models\MovimentoFinanceiro  $movimentoFinanceiro
     * @return void
     */
    public function deleted(MovimentosFinanceiro $movimentoFinanceiro)
    {
        $saldo = $movimentoFinanceiro->saldo;
        $valorMovimento = $movimentoFinanceiro->valor;

        Saldo::where('created_at', '>', $saldo->created_at)
            ->update([
                'valor' => DB::raw("valor + $valorMovimento")
            ]);

        $saldo->delete();
    }

    /**
     * Handle the MovimentosFinanceiro "restored" event.
     *
     * @param  \App\Models\MovimentosFinanceiro  $movimentoFinanceiro
     * @return void
     */
    public function restored(MovimentosFinanceiro $movimentoFinanceiro)
    {
        //
    }

    /**
     * Handle the MovimentosFinanceiro "force deleted" event.
     *
     * @param  \App\Models\MovimentosFinanceiro  $movimentoFinanceiro
     * @return void
     */
    public function forceDeleted(MovimentosFinanceiro $movimentoFinanceiro)
    {
        //
    }
}
