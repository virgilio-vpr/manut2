@extends('adminlte::page')

@section('title', 'Cadastrar Função')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Função</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('roles.create') }}">Nova Função</a></li>
    </ol>

    <div class="col">
        <div class="row">
            <h1>Cadastrar Função</h1>
            </h1>&ensp;&ensp;
            <a href="{{ route('roles.index') }}" class="btn btn-secondary"><i class="fas fa-undo"></i></a>
        </div>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('roles.store') }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.pages.roles._partials.form')
            </form>
        </div>
    </div>
@endsection
