<div class="container col-">
    <br>
    <br>
    <div class="justify-content-center">

        @include('admin.includes.alerts')

        <div class="card text-white bg-info mb-3">
            <div class="card-header">
                <h4 class="text-center">Login do Usuário</h4>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="login">
                    <div class="form-group">
                        <label for="userEmail">Email</label>
                        <input type="email" wire:model.defer="email" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="userPassword">Senha</label>
                        <input type="password" wire:model.defer="password" class="form-control">
                    </div>
                    <br>
                    <button class="btn text-white btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>
