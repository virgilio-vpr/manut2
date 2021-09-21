@extends('adminlte::page')

@section('title', 'Editar Departemento')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('companies.index') }}">Empresas</a></li>
        <li class="breadcrumb-item"><a href="{{ route('directions.company.index', $company->url_company) }}">Diretorias</a></li>
        <li class="breadcrumb-item"><a href="{{ route('managements.direction.index', $direction->url_direction) }}">Gerências</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('departments.management.index', $management->url_management) }}">Departameentos</a></li>
    </ol>

    <div class="col">
        <div class="row">
            <h1>Editar Departamento
            </h1>&ensp;&ensp;
            <a href="{{ route('departments.management.index', $management->url_management) }}" class="btn btn-secondary"><i class="fas fa-undo"></i></a>
        </div>
    </div>
@stop

@section('content')
        <div class="card">
            <div class="card-body">
                <form action="{{ route('departments.management.update', [$management->url_management, $management->id, $department->id]) }}" class="form" method="POST">
                    @csrf
                    @method('PUT')
                    @include('admin.pages.departments._partials.form')
                </form>
            </div>
        </div>
@endsection
