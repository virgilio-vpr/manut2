@include('admin.includes.alerts')
<div class="form-group">
    <label>Nome do Usuário:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome do Usuário:" value="{{ $user->name ?? old('name') }}">
</div>
<div class="form-group">
    <label>Email:</label>
    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email ?? old('email') }}">
</div>

<div class="form-group">
    <label>Função:</label>
    <select name="role_id" id="role_id" class="form-control" >
        <option value="">Selecione a função</option>
            @foreach($rolesSelects as $rolesSelect)
                @php
                    if ($user->role_id == $rolesSelect->id){
                            $oldRole = $user->role_id;
                    }else {
                            $oldRole = old('role_id');
                    }
                @endphp
                <option {{ $oldRole == $rolesSelect->id ? "selected" : "" }} value={{ $rolesSelect->id }}>{{ $rolesSelect->name }}</option>
            @endforeach
    </select>
</div>

<div class="form-group">
    <label>Seção:</label>
    <select class="form-control" name="section_name" id="section_name">
        <option value="">Selecione a Seção</option>

        <optgroup label="Diretoria">
            @foreach($directions as $direction)
                @php
                    if ($user->section_name == $direction->name_direction){
                            $oldSectionName = $user->section_name;
                    }else {
                            $oldSectionName = old('role_id');
                    }
                @endphp
                <option {{ $oldSectionName == $direction->name_direction ? "selected" : "" }} value={{ $direction->name_direction }}>{{ $direction->name_direction }}</option>
            @endforeach
        </optgroup>

        <optgroup label="Gerência">
            @foreach($managements as $management)
                @php
                    if ($user->section_name == $management->name_management){
                            $oldSectionName = $user->section_name;
                    }else {
                            $oldSectionName = old('role_id');
                    }
                @endphp
                <option {{ $oldSectionName == $management->name_management ? "selected" : "" }} value={{ $management->name_management }}>{{ $management->name_management }}</option>
            @endforeach
        </optgroup>

        <optgroup label="Setor">
            @foreach($departments as $department)
                @php
                    if ($user->section_name == $department->name_department){
                            $oldSectionName = $user->section_name;
                    }else {
                            $oldSectionName = old('role_id');
                    }
                @endphp
                <option {{ $oldSectionName == $department->name_department ? "selected" : "" }} value={{ $department->name_department }}>{{ $department->name_department }}</option>
            @endforeach
        </optgroup>

    </select>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>
