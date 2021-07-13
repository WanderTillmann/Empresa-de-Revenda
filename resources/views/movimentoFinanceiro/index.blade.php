@extends('layouts.app')

@section('title')
    <h1>Listagem Movimentos Financeiros</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('movimentofinanceiro.index') }}">Listagem Movimentos Financeiros</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Movimentos Financeiros</div>
                    <div class="card-body">
                        <form action="" method="get">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label" for="data_inicial">Data Inicial</label>
                                        <div class="input-group">
                                            <input type="text" id="data_inicial" name="data_inicial"
                                                class="form-control data" value="{{ request('data_inicial') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label" for="data_final">Data Final</label>
                                        <div class="input-group">
                                            <input type="text" name="data_final" id="data_final" class="form-control data"
                                                value="{{ request('data_final') }}">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group pt-2">
                                        <label for="" class="control-label"></label>
                                        <div class="input-group"><button type="submit" class="btn btn-info m-t-xs"
                                                title="Buscar Conta"><i class="fa fa-search"
                                                    aria-hidden="true"></i>Buscar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tipo</th>
                                        <th>Empresa</th>
                                        <th>Descricao</th>
                                        <th>Valor</th>
                                        <th>Data</th>
                                        <th>Açōes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($movimentos_financeiros as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

                                            <td><span
                                                    class="badge badge-{{ $item->tipo === 'entrada' ? 'success' : 'danger' }}">{{ ucfirst($item->tipo) }}</span>
                                            </td>
                                            <td>{{ $item->empresa->nome }} - {{ $item->empresa->razao_social }}</td>
                                            <td>{{ $item->descricao }}</td>
                                            <td>R$ {{ numero_br($item->valor) }}</td>
                                            <td>{{ data_br($item->created_at) }}</td>
                                            <td>
                                                <a href="{{ url('/movimentofinanceiro/' . $item->id) }}"
                                                    title="View Movimentos_financeiro"><button
                                                        class="btn btn-info btn-sm"><i class="fa fa-eye"
                                                            aria-hidden="true"></i> Detalhes</button></a>

                                                <form method="POST"
                                                    action="{{ url('/movimentofinanceiro' . '/' . $item->id) }}"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Tem certeza que dejesa apagar o  Movimentos_financeiro ?"
                                                        onclick="return confirm(&quot;Tem certeza que deseja deletar?&quot;)"><i
                                                            class="fa fa-trash-o" aria-hidden="true"></i>
                                                        Apagar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="{{ url('/movimentofinanceiro/create') }}" class="btn btn-success btn-sm"
                                title="Novo Movimentos_financeiro">
                                <i class="fa fa-plus" aria-hidden="true"></i> Novo
                            </a>
                            <div class="pagination-wrapper"> {!! $movimentos_financeiros->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
