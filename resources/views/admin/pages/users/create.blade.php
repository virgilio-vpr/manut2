@extends('adminlte::page')

@section('title', 'Cadastrar Usuário')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Função</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.role.index', $role->id) }}">Usuários</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('users.role.create', $role->id) }}">Novo Usuário</a></li>
    </ol>


    <div class="col">
        <div class="row">
            <h1>Cadastrar usuário para função <strong>{{ $role->name }}</strong></h1>
            </h1>&ensp;&ensp;
            <a href="{{ route('users.role.index', $role->id) }}" class="btn btn-secondary"><i class="fas fa-undo"></i></a>
        </div>
    </div>
@stop

@section('content')
        <div class="card">
            <div class="card-body">
                <form action="{{ route('users.role.store') }}" class="form" method="POST">
                    @csrf
                    @include('admin.pages.users._partials.form')
                </form>
            </div>
        </div>
@endsection
