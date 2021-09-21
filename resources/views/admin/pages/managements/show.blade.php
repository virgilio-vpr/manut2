@extends('adminlte::page')

@section('title', "Detalhes da Diretoria {$management->name_management}")

@section('content_header')
    <div class="col">
        <div class="row">
            <h1>Detalhes da Gerência <strong><b>{{ $management->name_management }}</b></strong>&nbsp;&nbsp;&nbsp;&nbsp;</h1>
            <a href="{{ route('managements.direction.index', $direction->url_direction) }}" class="btn btn-secondary"><i class="fas fa-undo"></i></a>
        </div>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <ul class="list-group list-group-flush">

                <li class="list-group-item">
                    <strong>Nome da Gerência: </strong> {{ $management->name_management }}
                </li>

                <li class="list-group-item">
                    <strong>URL da Gerência: </strong> {{ $management->url_management }}
                </li>

                <li class="list-group-item">
                    <strong>Descrição: </strong> {{ $management->description }}
                </li>

            </ul>

            <br>

            <form action="{{ route('managements.direction.destroy', [$direction->url_direction, $management->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> DELETAR</button>
            </form>

        </div>
    </div>
@endsection

