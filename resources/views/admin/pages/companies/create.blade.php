@extends('adminlte::page')

@section('title', 'Cadastrar Empresa')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('companies.index') }}">Empresas</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('companies.create') }}">Nova</a></li>
    </ol>

    <div class="col">
        <div class="row">
            <h1>Cadastrar Empresa</h1>
            </h1>&ensp;&ensp;
            <a href="{{ route('companies.index') }}" class="btn btn-secondary"><i class="fas fa-undo"></i></a>
        </div>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('companies.store') }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.pages.companies._partials.form')
            </form>
        </div>
    </div>  
@endsection
