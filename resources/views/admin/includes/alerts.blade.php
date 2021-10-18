@if ($errors->any())
    <x-adminlte-modal id="modal" title="Attention" theme="warning"
        icon="fas fa-exclamation-triangle" size='lg' disable-animations>
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    </x-adminlte-modal>
@endif

@if (session('message'))
        <x-adminlte-modal id="modal" title="Success" theme="success"
        icon="fas fa-check-circle" size='lg' disable-animations>
            <div>
                {{ session('message') }}
            </div>
        </x-adminlte-modal>
@endif

@if (session('error'))
    <x-adminlte-modal id="modal" title="Error" theme="danger"
    icon="fas fa-exclamation-circle" size='lg' disable-animations>
        <div>
            {{ session('error') }}
        </div>
    </x-adminlte-modal>
@endif

@if (session('warning'))
        <x-adminlte-modal id="modal" title="Attention" theme="warning"
        icon="fas fa-exclamation-triangle" size='lg' disable-animations>
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        </x-adminlte-modal>
@endif


