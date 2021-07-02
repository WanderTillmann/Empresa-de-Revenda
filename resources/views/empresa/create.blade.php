@extends('layouts.app')

@section('title')
    <h1>Criar {{ $tipo }}</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('empresas.index') }}?tipo={{ $tipo }}">Listar {{ $tipo }}</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('empresas.create') }}?tipo={{ $tipo }}">Criar {{ $tipo }}</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Entre com os dados</div>
                    <div class="card-body">
                        <form action="{{ route('empresas.store') }}" method="post">
                            <input type="hidden" name="tipo" id="tipo" value="{{ $tipo }}">
                            @include('empresa.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
