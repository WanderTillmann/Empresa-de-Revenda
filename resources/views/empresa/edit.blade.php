@extends('layouts.app')

@section('title')
    <h1> Editar {{ $empresa->nome }}</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('empresas.index') }}?tipo={{ $empresa->tipo }}">Listar {{ $empresa->tipo }}</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('empresas.show', $empresa) }}">Editar {{ $empresa->nome }}</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Altere os dados necessários</div>
                    <div class="card-body">
                        <form action="{{ route('empresas.update', $empresa) }}" method="post">
                            @method("PUT")
                            @include('empresa.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
