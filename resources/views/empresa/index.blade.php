@extends('layouts.app')

@section('title')
    <h1> Listagem de {{ $tipo }}</h1>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('empresas.index') }}?tipo={{ $tipo }}">Listagem de {{ $tipo }}</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mx-0">Listagem de {{ $tipo }}</h3>
                        <div class="card-tools">
                            <a href="{{ route('empresas.create') }}?tipo={{ $tipo }}" class="btn btn-success">Novo
                                {{ $tipo }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width:10px">#</th>
                                    <th>Nome Empresa</th>
                                    <th>Nome contato</th>
                                    <th>Celular</th>
                                    <th>Açoes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($empresas as $empresa)
                                    <tr>
                                        <td>{{ $empresa->id }}</td>
                                        <td>{{ $empresa->nome }}</td>
                                        <td>{{ $empresa->nome_contato }}</td>
                                        <td>{{ mascara($empresa->celular, '(##) #####-####') }}</td>
                                        <td> <a href="{{ route('empresas.show', $empresa) }}"
                                                class="btn btn-primary btn-sm">Detalhes</a>
                                            <a href="{{ route('empresas.edit', $empresa) }}"
                                                class="btn btn-danger btn-sm">Atualizar</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Nenhum registro cadastrado</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix ">
                        {{ $empresas->appends(['tipo' => request('tipo')])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
