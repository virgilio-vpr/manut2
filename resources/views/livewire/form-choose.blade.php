<div class="container col-6">
    <div class="card">
        <div class="card-body justify-content-center">

            <h4 class="my-3">SELECIONE OS CAMPOS</h4>

            {{-- <form action="#" wire:submit.prevent="teste('url_company')" class="form" method="POST"> --}}
            <form action="#" class="form" method="POST">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="companyId">Empresa</label>
                    <select wire:model="companyId" name="companyId" id="company_id" class="form-control">
                    <option>Selecione a Empresa</option>
                    @foreach($companies as $company)
                        <option value={{ $company->id }}>{{ $company->name_company }}</option>
                    @endforeach
                    </select>
                </div>

                @if(count($directions) > 0)
                    <div class="form-group">
                        <label for="direction_id">Diretoria</label>
                        <select wire:model="directionId" name="direction_id" id="direction_id" class="form-control {{ count($directions)==0 ? 'hidden' : '' }}" >
                        <option>Selecione a Diretoria</option>
                        @foreach($this->directions as $direction)
                            <option value={{ $direction->id }}>{{ $direction->name_direction }}</option>
                        @endforeach
                        </select>
                    </div>
                    <button class="btn btn-primary my-3">Buscar</button>
                @endif

            </form>

        </div>
    </div>
</div>
