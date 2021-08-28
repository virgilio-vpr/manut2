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
            <a href="" class="btn btn-secondary"><i class="fas fa-undo"></i></a>
        </div>
    </div>
@stop

@section('content')
    <div class="container col-6">
        <div class="card">
            <div class="card-body row justify-content-center">

                <h4 class="my-3">SELECIONE OS CAMPOS</h4>

                <form action="" class="form" method="POST">
                    @csrf
                    @method('PUT')

                    <select name="url_company" class="custom-select mb-3">
                        <option selected>Selecione a Empresa</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->url_company }}">{{ $company->name_company }}</option>
                        @endforeach
                    </select>

                    <select name="url_direction" class="custom-select mb-3">
                        <option selected>Selecione a Diretoria</option>
                        @foreach ($directions as $direction)
                            <option value="{{ $direction->url_direction }}">{{ $direction->name_direction }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-primary my-3">Buscar</button>
                </form>

            </div>
        </div>
    </div>
@endsection
