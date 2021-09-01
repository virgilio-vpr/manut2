@extends('adminlte::page')

@section('title', 'Escolher Diretoria')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('companies.index') }}">Empresas</a></li>
        {{-- <li class="breadcrumb-item"><a href="{{ route('companies.show', $company->url_company) }}">{{ $company->name_company }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('directions.company.index', $company->url_company) }}">Diretoria</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('directions.company.create', $company->url_company) }}">Nova</a></li> --}}
    </ol>


    <div class="col">
        <div class="row">
            <h1>Escolher Diretoria</h1>
            </h1>&ensp;&ensp;
            <a href="{{ route('companies.index') }}" class="btn btn-secondary"><i class="fas fa-undo"></i></a>
        </div>
    </div>
@stop

@section('content')
        @livewire('form-choose', ['companies' => $companies])
@endsection
