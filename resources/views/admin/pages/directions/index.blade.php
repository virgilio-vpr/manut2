@extends('adminlte::page')

@section('title', "Diretorias da {$company->name_company}")

@section('content_header')
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('companies.index') }}">Empresas</a></li>
            <li class="breadcrumb-item"><a href="{{ route('companies.show', $company->url_company) }}">{{ $company->name_company }}</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('directions.company.index', $company->url_company) }}">Diretorias</a></li>
        </ol>

        <div class="col">
            <div class="row">
                <h1>Diretorias da Empresa <strong>{{ $company->name_company }}</strong> &ensp;
                    <a href="{{ route('directions.company.create', $company->url_company) }}" class="btn btn-success">
                        <i class="fas fa-plus"></i>
                    </a>&ensp;&ensp;
                </h1>
                <a href="{{ route('companies.index') }}" class="btn btn-secondary"><i class="fas fa-undo"></i></a>
            </div>
        </div>
@stop
@section('content')
    <div class="card">
        <div class="card-header">

            <div class="card-header">
                <form action="{{ route('directions.company.search', $company->url_company) }}" method="post" class="form form-inline">
                @csrf
                    <div class="input-group">
                        <input type="text" name="filter" placeholder="Diretoria" class="form-control" aria-describedby="basic-addon2" value="{{ $filters['filter'] ?? '' }}">
                        <div class="input-group-append">
                            <button class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div class="card-body">

            @include('admin.includes.alerts')

            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Diretoria</th>
                        <th>Centro de Custo</th>
                        <th width="300">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($directions as $direction)
                    <tr>
                        <td>
                            {{ $direction->name_direction }}
                        </td>
                        <td>
                            {{ $direction->cost_center }}
                        </td>
                        <td style="width=10px">
                            <div class="row justify-content-between">
                                <div class="col-3">
                                    <a href="{{ route('directions.company.index', $company->url_company) }}" class="btn btn-primary"><i class="far fa-building"></i></a>
                                </div>
                                <div class="col-3">
                                    <a href="{{ route('directions.company.edit', [$company->url_company, $direction->id]) }}" class="btn btn-info"><i class="far fa-edit"></i></a>
                                </div>
                                <div class="col-3">
                                    <a href="{{ route('directions.company.show', [$company->url_company, $direction->id]) }}" class="btn btn-warning"><i class="fas fa-info-circle"></i></a>
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
                {{ $directions->appends($filters)->links() }}
            @else
                {{ $directions->links() }}
            @endif
        </div>
    </div>
@stop
