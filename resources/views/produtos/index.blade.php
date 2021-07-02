@extends('layouts.app')

@section('title')
    <h1>Listagem de Produto</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('produtos.index') }}">Listagem de Produto</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Produtos</div>
                    <div class="card-body">
                        <a href="{{ url('/produtos/create') }}" class="btn btn-success btn-sm" title="Novo Produto">
                            <i class="fa fa-plus" aria-hidden="true"></i> Novo
                        </a>

                        <form method="GET" action="{{ url('/produtos') }}" accept-charset="UTF-8"
                            class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Buscar"
                                    value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Descricao</th>
                                    <th>Açōes</th>
                                </tr>
                            </thead>
                            <tbody class="col-12">
                                @forelse ($produtos as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nome }}</td>
                                        <td>{{ $item->descricao }}</td>
                                        <td>
                                            <a href="{{ url('/produtos/' . $item->id) }}" title="View Produto"><button
                                                    class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                                                    Detalhes</button></a>
                                            <a href="{{ url('/produtos/' . $item->id . '/edit') }}"
                                                title="Edit Produto"><button class="btn btn-primary btn-sm"><i
                                                        class="fa fa-pencil-square-o"
                                                        aria-hidden="true"></i>Atualizar</button></a>

                                            <form method="POST" action="{{ url('/produtos' . '/' . $item->id) }}"
                                                accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    title="Tem certeza que dejesa apagar o  Produto ?"
                                                    onclick="return confirm(&quot;Tem certeza que deseja deletar?&quot;)"><i
                                                        class="fa fa-trash-o" aria-hidden="true"></i>
                                                    Apagar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="col-12">
                                        <td colspan="4" class="text-center">Nenhum produto cadastrado</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $produtos->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
