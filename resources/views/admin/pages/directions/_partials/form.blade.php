@include('admin.includes.alerts')
<div class="form-group">
    <label>Nome da Diretoria:</label>
    <input type="text" name="name_direction" class="form-control" placeholder="Nome da Diretoria:" value="{{ $direction->name_direction ?? old('name_direction') }}">
</div>
<div class="form-group">
    <label>Centro de Custo:</label>
    <input type="text" name="cost_center" class="form-control" placeholder="Centro de Custo:" value="{{ $direction->cost_center ?? old('cost_center') }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="description" class="form-control" placeholder="Descrição:" value="{{ $direction->description ?? old('description') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>
