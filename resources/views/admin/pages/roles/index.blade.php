@extends('adminlte::page')

@section('title', 'Função')

@section('content_header')
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('roles.index') }}">Função</a></li>
        </ol>
        <h1>Funções dos Usuários &ensp;<a href="{{ route('roles.create') }}" class="btn btn-success"><i class="fas fa-plus"></i></a></h1>
@stop
@section('content')
    <div class="card">

        <div class="card-header">
            <form action="{{ route('roles.search') }}" method="post" class="form form-inline">
            @csrf
                <div class="input-group">
                    <input type="text" name="filter" placeholder="Perfil" class="form-control" aria-describedby="basic-addon2" value="{{ $filters['filter'] ?? '' }}">
                    <div class="input-group-append">
                        <button class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>

        </div>


        <div class="card-body">
            
            <div>
                @include('admin.includes.alerts')
            </div>

            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Função</th>
                        <th>Descrição</th>
                        <th width="250">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <td>
                            {{ $role->name }}
                        </td>
                        <td>
                            {{ $role->description }}
                        </td>
                        <td style="width=10px">
                            <div class="row justify-content-between">
                                <div class="col-3">
                                    <a href="{{ route('users.role.index', $role->id) }}" class="btn btn-primary"><i class="fas fa-users"></i></a>
                                </div>
                                <div class="col-3">
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info"><i class="far fa-edit"></i></a>
                                </div>
                                <div class="col-3">
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                    </form>
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
                {{ $roles->appends($filters)->links() }}
            @else
                {{ $roles->links() }}
            @endif
        </div>
    </div>
@stop
