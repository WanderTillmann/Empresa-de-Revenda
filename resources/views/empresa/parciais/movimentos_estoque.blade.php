<div class="col-md-12">
    <div class="card">
        @if ($empresa->tipo === 'fornecedor')
            <div class="card-header">Ultimas items comprados deste fornecedor:</div>
        @else
            <div class="card-header">Ultimas items vendidos para este cliente:</div>
        @endif

        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Data</th>
                            <th>Tipo</th>
                            <th>Quantidade em KG</th>
                            <th>Valo em KG</th>
                            <th>Total</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($empresa->movimentosEstoque as $movimentoEstoque)
                            <tr>
                                <td>{{ $movimentoEstoque->produto->nome }}</td>
                                <td>{{ data_br($movimentoEstoque->created_at) }}</td>
                                <td>{{ ucfirst($movimentoEstoque->tipo) }}</td>
                                <td>{{ numero_br($movimentoEstoque->quantidade) }}</td>
                                <td>{{ numero_br($movimentoEstoque->valor) }}</td>
                                <td>R$ {{ numero_br($movimentoEstoque->quantidade * $movimentoEstoque->valor) }}</td>
                                <td>
                                    <form action="{{ route('movimentosestoque.destroy', $movimentoEstoque) }}"
                                        accept-charset="UTF-8" style="display:inline" method="post">
                                        @method("DELETE")
                                        @csrf
                                        <button type="submit" class="btn btn-sm  btn-danger" title="Apagar Movimento"
                                            onclick="return confirm(&quot; Tem certeza que deseja apagar esse movimento?&quot)"><i
                                                class="fa fa-trash-o" aria-hidden="true"></i> Deletar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <hr>
            <form action="{{ route('movimentosestoque.store') }}" method="post">
                @csrf
                <input type="hidden" name="empresa_id" value="{{ $empresa->id }}">
                <input type="hidden" name="tipo"
                    value="{{ $empresa->tipo === 'fornecedor' ? 'entrada' : 'saida' }}" />
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="produto">Produto</label>
                            <div class="input-group ">
                                <select name="produto_id" id="produto-ajax" type="text" class="form-control "
                                    style="width=100%">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="quantidade">Quantidade (KG)</label>
                            <div class="input-group">
                                <input id="quantidade" name="quantidade" type="text" class="form-control money"
                                    type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label" for="qauntidade">Valor por KG</label>
                            <div class="input-group">
                                <input id="valor" name="valor" type="text" class="form-control money" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group pt-2">
                            <label for="control-label"> </label>
                            <div class="input-group">
                                <button class="btn btn-sm  btn-info" type="submit">
                                    <i class="fa fa-plus">Adicionar</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
