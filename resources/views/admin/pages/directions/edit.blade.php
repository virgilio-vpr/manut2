@extends('adminlte::page')

@section('title', 'Editar Diretoria')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('companies.index') }}">Empresas</a></li>
        <li class="breadcrumb-item"><a href="{{ route('companies.show', $company->url_company) }}">{{ $company->name_company }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('directions.company.index', $company->url_company) }}">Diretoria</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('directions.company.edit', [$company->url_company, $direction->id]) }}">Editar</a></li>
    </ol>


    <div class="col">
        <div class="row">
            <h1>Editar Diretoria
            </h1>&ensp;&ensp;
            <a href="{{ route('directions.company.index', $company->url_company) }}" class="btn btn-secondary"><i class="fas fa-undo"></i></a>
        </div>
    </div>
@stop


@section('content')
        <div class="card">
            <div class="card-body">
                <form action="{{ route('directions.company.update', [$company->url_company, $company->id, $direction->id]) }}" class="form" method="POST">
                    @csrf
                    @method('PUT')
                    @include('admin.pages.directions._partials.form')
                </form>
            </div>
        </div>
@endsection
