@extends('adminlte::page')

@section('title', "Departamento da {$management->name_management}")

@section('content_header')
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('companies.index') }}">Empresas</a></li>
            <li class="breadcrumb-item"><a href="{{ route('directions.company.index', $company->url_company) }}">Diretorias</a></li>
            <li class="breadcrumb-item"><a href="{{ route('managements.direction.index', $direction->url_direction) }}">Gerências</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('departments.management.index', $management->url_management) }}">Departamento</a></li>
        </ol>

        <div class="col">
            <div class="row">
                <h1>Departamentos da Gerência <strong>{{ $management->name_management }}</strong> &ensp;
                    <a href="{{ route('departments.management.create', $management->url_management) }}" class="btn btn-success">
                        <i class="fas fa-plus"></i>
                    </a>&ensp;&ensp;
                </h1>
                <a href="{{ route('managements.direction.index', $direction->url_direction) }}" class="btn btn-secondary"><i class="fas fa-undo"></i></a>
            </div>
        </div>
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('departments.management.search', $management->url_management) }}" method="post" class="form form-inline">
            @csrf
                <div class="input-group">
                    <input type="text" name="filter" placeholder="Departamento" class="form-control" aria-describedby="basic-addon2" value="{{ $filters['filter'] ?? '' }}">
                    <div class="input-group-append">
                        <button class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-body">

            @include('admin.includes.alerts')

            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Departamento</th>
                        <th>Centro de Custo</th>
                        <th width="300">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department)
                    <tr>
                        <td>
                            {{ $department->name_department }}
                        </td>
                        <td>
                            {{ $department->cost_center }}
                        </td>
                        <td style="width=10px">
                            <div class="row justify-content-between">
                                <div class="col-3">
                                    <a href="{{ route('departments.management.index', $management->url_management) }}" class="btn btn-primary"><i class="far fa-building"></i></a>
                                </div>
                                <div class="col-3">
                                    <a href="{{ route('departments.management.edit', [$management->url_management, $department->id]) }}" class="btn btn-info"><i class="far fa-edit"></i></a>
                                </div>
                                <div class="col-3">
                                    <a href="{{ route('departments.management.show', [$management->url_management, $department->id]) }}" class="btn btn-warning"><i class="fas fa-info-circle"></i></a>
                                </div>
                              </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {{ $departments->appends($filters)->links() }}
            @else
                {{ $departments->links() }}
            @endif
        </div>
    </div>
@stop
