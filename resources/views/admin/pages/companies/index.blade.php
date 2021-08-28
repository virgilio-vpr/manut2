@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('companies.index') }}">Empresas</a></li>
        </ol>
        <h1>Empresas &ensp;<a href="{{ route('companies.create') }}" class="btn btn-success"><i class="fas fa-plus"></i></a></h1>
@stop
@section('content')
    <div class="card">

        <div class="card-header">
            <form action="{{ route('companies.search') }}" method="post" class="form form-inline">
            @csrf
                <div class="input-group">
                    <input type="text" name="filter" placeholder="Empresa" class="form-control" aria-describedby="basic-addon2" value="{{ $filters['filter'] ?? '' }}">
                    <div class="input-group-append">
                        <button class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="300">logo</th>
                        <th>Empresa</th>
                        <th width="250">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                    <tr>
                        <td>
                            <img src="{{ url("storage/{$company->logo_company}") }}" alt="{{  $company->name_company }}" style="max-width: 90px;  max-height: 40px;">
                        </td>
                        <td>
                            {{ $company->name_company }}
                        </td>
                        <td style="width=10px">
                            <div class="row justify-content-between">
                                <div class="col-3">
                                    <a href="{{ route('directions.company.index', $company->url_company) }}" class="btn btn-primary"><i class="far fa-building"></i></a>
                                </div>
                                <div class="col-3">
                                    <a href="{{ route('companies.edit', $company->url_company) }}" class="btn btn-info"><i class="far fa-edit"></i></a>
                                </div>
                                <div class="col-3">
                                    <a href="{{ route('companies.show', $company->url_company) }}" class="btn btn-warning"><i class="fas fa-info-circle"></i></a>
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
                {{ $companies->appends($filters)->links() }}
            @else
                {{ $companies->links() }}
            @endif
        </div>
    </div>
@stop
