@extends('adminlte::page')

@section('title', "Editar Função {$role->name}")

@section('content_header')

    <div class="col">
        <div class="row">
            <h1>Editar Função {{ $role->name }}</h1>
            </h1>&ensp;&ensp;
            <a href="{{ route('roles.index') }}" class="btn btn-secondary"><i class="fas fa-undo"></i></a>
        </div>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('roles.update', $role->id) }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.pages.roles._partials.form')
            </form>
        </div>
    </div>
@endsection
