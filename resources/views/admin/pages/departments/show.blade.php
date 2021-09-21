@extends('adminlte::page')

@section('title', "Detalhes do Departamento {$department->name_department}")

@section('content_header')
    <div class="col">
        <div class="row">
            <h1>Detalhes do Departamento <strong><b>{{ $department->name_department }}</b></strong>&nbsp;&nbsp;&nbsp;&nbsp;</h1>
            <a href="{{ route('departments.management.index', $management->url_management) }}" class="btn btn-secondary"><i class="fas fa-undo"></i></a>
        </div>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <ul class="list-group list-group-flush">

                <li class="list-group-item">
                    <strong>Nome da Departemento: </strong> {{ $department->name_department }}
                </li>

                <li class="list-group-item">
                    <strong>URL da Departamento: </strong> {{ $department->url_department }}
                </li>

                <li class="list-group-item">
                    <strong>Descrição: </strong> {{ $department->description }}
                </li>

            </ul>

            <br>

            <form action="{{ route('departments.management.destroy', [$management->url_management, $department->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> DELETAR</button>
            </form>

        </div>
    </div>
@endsection

