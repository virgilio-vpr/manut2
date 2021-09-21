@extends('adminlte::page')

@section('title', 'Cadastrar Gerência')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('companies.index') }}">Empresas</a></li>
        <li class="breadcrumb-item"><a href="{{ route('directions.company.index', $company->url_company) }}">Diretorias</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('managements.direction.index', $direction->url_direction) }}">Gerências</a></li>
    </ol>

    <div class="col">
        <div class="row">
            <h1>Cadastrar Gerência da Diretoria <strong>{{ $direction->name_direction }}</strong></h1>
            </h1>&ensp;&ensp;
            <a href="{{ route('managements.direction.index', $direction->url_direction) }}" class="btn btn-secondary"><i class="fas fa-undo"></i></a>
        </div>
    </div>
@stop

@section('content')
        <div class="card">
            <div class="card-body">
                <form action="{{ route('managements.direction.store', [$direction->url_direction, $direction->id]) }}" class="form" method="POST">
                    @csrf
                    @include('admin.pages.managements._partials.form')
                </form>
            </div>
        </div>
@endsection
