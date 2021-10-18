@extends('adminlte::page')

@section('title', "Detalhes do Usuário {$user->name}")

@section('content_header')
    <div class="col">
        <div class="row">
            <h1>Detalhes do Usuário <strong><b>{{ $user->name }}</b></strong>&nbsp;&nbsp;&nbsp;&nbsp;</h1>
            <a href="{{ route('users.role.index', $role->id) }}" class="btn btn-secondary"><i class="fas fa-undo"></i></a>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <ul class="list-group list-group-flush">

                <li class="list-group-item">
                    <strong>Nome do Usuário: </strong> {{ $user->name }}
                </li>

                <li class="list-group-item">
                    <strong>email: </strong> {{ $user->email }}
                </li>

                <li class="list-group-item">
                    <strong>Função: </strong> {{ $role->name }}
                </li>

                <li class="list-group-item">
                    <strong>Seção: </strong> {{ $user->section_name }}
                </li>

                <li class="list-group-item">
                    <strong>Descrição: </strong> {{ $role->description }}
                </li>

            </ul>

            <br>

            <form action="{{ route('users.role.destroy', [$role->id, $user->id]) }}" method="POST">
                <fieldset
                    @if ($user->id == auth()->user()->id)

                        disabled

                    @endif>

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> DELETAR</button>
                </fieldset>
            </form>

        </div>
    </div>
@endsection

