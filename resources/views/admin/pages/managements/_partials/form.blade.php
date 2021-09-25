@include('admin.includes.alerts')
<div class="form-group">
    <label>Nome da Gerência:</label>
    <input type="text" name="name_management" class="form-control" placeholder="Nome da Gerência:" value="{{ $management->name_management ?? old('name_management') }}">
</div>
<div class="form-group">
    <label>Centro de Custo:</label>
    <input type="text" name="cost_center" class="form-control" placeholder="Centro de Custo:" value="{{ $management->cost_center ?? old('cost_center') }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="description" class="form-control" placeholder="Descrição:" value="{{ $management->description ?? old('description') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>
