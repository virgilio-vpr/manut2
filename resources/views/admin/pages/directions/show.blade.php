@extends('adminlte::page')

@section('title', "Detalhes da Diretoria {$direction->name_direction}")

@section('content_header')
    <div class="col">
        <div class="row">
            <h1>Detalhes da Diretoria <strong><b>{{ $direction->name_direction }}</b></strong>&nbsp;&nbsp;&nbsp;&nbsp;</h1>
            <a href="{{ route('directions.company.index', $company->url_company) }}" class="btn btn-secondary"><i class="fas fa-undo"></i></a>
        </div>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <ul class="list-group list-group-flush">

                <li class="list-group-item">
                    <strong>Nome da Diretoria: </strong> {{ $direction->name_direction }}
                </li>

                <li class="list-group-item">
                    <strong>URL da Diretoria: </strong> {{ $direction->url_direction }}
                </li>

                <li class="list-group-item">
                    <strong>Logo da Diretoria: </strong> {{ $direction->logo_direction }}
                </li>

                <li class="list-group-item">
                    <strong>Descrição: </strong> {{ $direction->description }}
                </li>

            </ul>

            <br>

            <form action="{{ route('directions.company.destroy', [$company->url_company, $direction->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> DELETAR</button>
            </form>

        </div>
    </div>
@endsection

