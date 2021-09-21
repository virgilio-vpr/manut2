@extends('adminlte::page')

@section('title', "Gerencia da {$direction->name_direction}")

@section('content_header')
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('companies.index') }}">Empresas</a></li>
            <li class="breadcrumb-item"><a href="{{ route('directions.company.index', $company->url_company) }}">Diretorias</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('managements.direction.index', $direction->url_direction) }}">Gerências</a></li>
        </ol>

        <div class="col">
            <div class="row">
                <h1>Gerências da Diretoria <strong>{{ $direction->name_direction }}</strong> &ensp;
                    <a href="{{ route('managements.direction.create', $direction->url_direction) }}" class="btn btn-success">
                        <i class="fas fa-plus"></i>
                    </a>&ensp;&ensp;
                </h1>
                <a href="{{ route('directions.company.index', $company->url_company) }}" class="btn btn-secondary"><i class="fas fa-undo"></i></a>
            </div>
        </div>
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('managements.direction.search', $direction->url_direction) }}" method="post" class="form form-inline">
            @csrf
                <div class="input-group">
                    <input type="text" name="filter" placeholder="Gerência" class="form-control" aria-describedby="basic-addon2" value="{{ $filters['filter'] ?? '' }}">
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
                        <th>Gerencia</th>
                        <th>Centro de Custo</th>
                        <th width="300">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($managements as $management)
                    <tr>
                        <td>
                            {{ $management->name_management }}
                        </td>
                        <td>
                            {{ $management->cost_center }}
                        </td>
                        <td style="width=10px">
                            <div class="row justify-content-between">
                                <div class="col-3">
                                    <a href="{{ route('departments.management.index', $management->url_management) }}" class="btn btn-primary"><i class="far fa-building"></i></a>
                                </div>
                                <div class="col-3">
                                    <a href="{{ route('managements.direction.edit', [$direction->url_direction, $management->id]) }}" class="btn btn-info"><i class="far fa-edit"></i></a>
                                </div>
                                <div class="col-3">
                                    <a href="{{ route('managements.direction.show', [$direction->url_direction, $management->id]) }}" class="btn btn-warning"><i class="fas fa-info-circle"></i></a>
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
                {{ $managements->appends($filters)->links() }}
            @else
                {{ $managements->links() }}
            @endif
        </div>
    </div>
@stop
