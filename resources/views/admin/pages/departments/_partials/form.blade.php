@include('admin.includes.alerts')
<div class="form-group">
    <label>Nome do Departamento:</label>
    <input type="text" name="name_department" class="form-control" placeholder="Nome do Departamento:" value="{{ $department->name_department ?? old('name_department') }}">
</div>
<div class="form-group">
    <label>Centro de Custo:</label>
    <input type="text" name="cost_center" class="form-control" placeholder="Centro de Custo:" value="{{ $department->cost_center ?? old('cost_center') }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="description" class="form-control" placeholder="Descrição:" value="{{ $department->description ?? old('description') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>
