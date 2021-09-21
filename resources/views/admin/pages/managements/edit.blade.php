@extends('adminlte::page')

@section('title', 'Editar Diretoria')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('companies.index') }}">Empresas</a></li>
        <li class="breadcrumb-item"><a href="{{ route('directions.company.index', $company->url_company) }}">Diretorias</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('managements.direction.index', $direction->url_direction) }}">Gerências</a></li>
    </ol>

    <div class="col">
        <div class="row">
            <h1>Editar Gerência
            </h1>&ensp;&ensp;
            <a href="{{ route('managements.direction.index', $direction->url_direction) }}" class="btn btn-secondary"><i class="fas fa-undo"></i></a>
        </div>
    </div>
@stop

@section('content')
        <div class="card">
            <div class="card-body">
                <form action="{{ route('managements.direction.update', [$direction->url_direction, $direction->id, $management->id]) }}" class="form" method="POST">
                    @csrf
                    @method('PUT')
                    @include('admin.pages.managements._partials.form')
                </form>
            </div>
        </div>
@endsection
