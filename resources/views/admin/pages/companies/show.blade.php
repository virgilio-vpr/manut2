@extends('adminlte::page')

@section('title', "Detalhes da Empresa {$company->name_company}")

@section('content_header')
    <div class="col">
        <div class="row">
            <h1>Detalhes da Empresa <b>{{ $company->name_company }}</b>&nbsp;&nbsp;&nbsp;&nbsp;</h1>
            <a href="{{ route('companies.index') }}" class="btn btn-secondary"><i class="fas fa-undo"></i></a>
        </div>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <ul class="list-group list-group-flush">

                <li class="list-group-item">
                    <img src="{{ url("storage/{$company->logo_company}") }}" alt="{{ $company->name_company }}" style="max-width: 90px;  max-height: 50px;">
                </li>

                <li class="list-group-item">
                    <strong>Nome da Empresa: </strong> {{ $company->name_company }}
                </li>

                <li class="list-group-item">
                    <strong>URL da Empresa: </strong> {{ $company->url_company }}
                </li>

                <li class="list-group-item">
                    <strong>Descrição: </strong> {{ $company->description }}
                </li>

            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('companies.destroy', $company->url_company) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> DELETAR</button>
            </form>

        </div>
    </div>
@endsection

