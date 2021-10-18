@extends('adminlte::page')

@section('title', "Detalhes da Função {$role->name}")

@section('content_header')
    <div class="col">
        <div class="row">
            <h1>Detalhes da Função <b>{{ $role->name }}</b>&nbsp;&nbsp;&nbsp;&nbsp;</h1>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary"><i class="fas fa-undo"></i></a>
        </div>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <ul class="list-group list-group-flush">

                <li class="list-group-item">
                    <strong>Nome da Função: </strong> {{ $role->name }}
                </li>

                <li class="list-group-item">
                    <strong>Descrição: </strong> {{ $role->description }}
                </li>

            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>DELETAR</button>
            </form>

        </div>
    </div>
@endsection

