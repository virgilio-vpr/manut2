@extends('adminlte::page')

@section('title', "Editar a Empresa {$company->name_company}")

@section('content_header')

    <div class="col">
        <div class="row">
            <h1>Editar a Empresa {{ $company->name_company }}</h1>
            </h1>&ensp;&ensp;
            <a href="{{ route('companies.index') }}" class="btn btn-secondary"><i class="fas fa-undo"></i></a>
        </div>
    </div>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('companies.update', $company->url_company) }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.pages.companies._partials.form')
            </form>
        </div>
    </div>
@endsection
