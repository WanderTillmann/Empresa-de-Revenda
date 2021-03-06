@extends('layouts.app')

@section('title')
    <h1>Novo Movimento Financeiro</h1>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('movimentofinanceiro.index') }}">Listagem Movimentos Financeiros </a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('movimentofinanceiro.create') }}">Novo Movimento Financeiro</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Criar Movimentos Financeiro</div>
                    <div class="card-body">
                        <a href="{{ url('/movimentofinanceiro') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i>
                                Voltar</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/movimentofinanceiro') }}" accept-charset="UTF-8"
                            class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('movimentoFinanceiro.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
