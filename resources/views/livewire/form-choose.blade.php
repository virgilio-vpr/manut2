@section('title', "Escolher {$typeMenu}")


@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('companies.index') }}">Empresas</a></li>
    </ol>


    <div class="col">
        <div class="row">
            @if ($typeMenu == 'direction')
                <h1>Escolher Diretoria</h1>
            @elseif ($typeMenu == 'management')
                <h1>Escolher Gerência</h1>
            @endif
            </h1>&ensp;&ensp;
            <a href="{{ route('companies.index') }}" class="btn btn-secondary"><i class="fas fa-undo"></i></a>
        </div>
    </div>
@stop

<div class="container col-6">

    @include('admin.includes.alerts')

    <div class="card">

        <div class="card-body justify-content-center">

            <h4 class="my-3">SELECIONE OS CAMPOS</h4>

            <form wire:submit.prevent="sectorSelect">

                <div class="form-group">
                    <label for="companyId">Empresa</label>
                    <select wire:model="companyId" name="companyId" id="company_id" class="form-control">
                        <option>Selecione a Empresa</option>
                            @foreach($companies as $company)
                                <option value={{ $company->id }}>{{ $company->name_company }}</option>
                            @endforeach
                    </select>
                </div>

                @if((count($directions) > 0))
                    <div class="form-group">
                        <label for="directionId">Diretoria</label>
                        <select wire:model="directionId" name="directionId" id="directionId" class="form-control {{ count($directions)==0 ? 'hidden' : '' }}" >
                        <option>Selecione a Diretoria</option>
                            @foreach($this->directions as $direction)
                                <option value={{ $direction->id }}>{{ $direction->name_direction }}</option>
                            @endforeach
                        </select>
                    </div>

                    @if ($typeMenu == 'direction')
                        <button class="btn btn-primary my-3">Buscar</button>
                    @endif

                @endif

                @if(count($managements) > 0)
                    <div class="form-group">
                        <label for="managementId">Gerência</label>
                        <select wire:model="managementId" name="managementId" id="managementId" class="form-control {{ count($managements)==0 ? 'hidden' : '' }}" >
                        <option>Selecione a Gerência</option>
                            @foreach($this->managements as $management)
                                <option value={{ $management->id }}>{{ $management->name_management }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($typeMenu == 'management')
                    <button class="btn btn-primary my-3">Buscar</button>
                @endif
                @endif

                @if(count($departments) > 0 && $typeMenu == 'department')
                    <div class="form-group">
                        <label for="departmentId">Departamento</label>
                        <select wire:model="departmentId" name="departmentId" id="departmentId" class="form-control {{ count($departments)==0 ? 'hidden' : '' }}" >
                        <option>Selecione o Departamento</option>
                            @foreach($this->departments as $department)
                                <option value={{ $department->id }}>{{ $department->name_department }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-primary my-3">Buscar</button>
                @endif

            </form>

        </div>
    </div>
</div>
