@extends('adminlte::page')

@section('title', "Lista todos os usuários")

@section('content_header')
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Função</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('users.role.listAll') }}">Todos os usuários</a></li>
        </ol>

        <div class="col">
            <div class="row">
                <h1>Lista de todos os usuários</strong> &ensp;
                    <a href="{{ route('users.role.create') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i>
                    </a>&ensp;&ensp;
                </h1>
                <a href="{{ route('roles.index') }}" class="btn btn-secondary"><i class="fas fa-undo"></i></a>
            </div>
        </div>
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('users.role.search') }}" method="post" class="form form-inline">
            @csrf
                <div class="input-group">
                    <input type="text" name="filter" placeholder="Usuário" class="form-control" aria-describedby="basic-addon2" value="{{ $filters['filter'] ?? '' }}">
                    <div class="input-group-append">
                        <button class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-body">

            @include('admin.includes.alerts')

            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome:</th>
                        <th>Email</th>
                        <th>Seção</th>
                        <th>Função</th>
                        <th width="300">Ações</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($roles as $role)
                    @foreach ($users as $auxUsers)
                    @foreach ($auxUsers as $user)
                        @if ($user->role_id === $role->id)
                            <tr>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $user->section_name }}
                                </td>
                                <td>
                                    {{ $role->name}}
                                </td>
                                <td style="width=10px">
                                    <div class="row justify-content-between">
                                        <div class="col-3">
                                            <a href="{{-- route('managements.user.index', $user->url_user) --}}" class="btn btn-primary"><i class="far fa-building"></i></a>
                                        </div>
                                        <div class="col-3">
                                            <a href="{{ route('users.role.edit', [$role->id, $user->id]) }}" class="btn btn-info"><i class="far fa-edit"></i></a>
                                        </div>
                                        <div class="col-3">
                                            <a href="{{ route('users.role.show', [$role->id, $user->id]) }}" class="btn btn-warning"><i class="fas fa-info-circle"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @foreach ($users as $auxUser)
                @if (isset($filters))
                    {{ $auxUser->appends($filters)->links() }}
                @else
                    {{ $auxUser->links() }}
                @endif
            @endforeach
        </div>
    </div>
@stop
