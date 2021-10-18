<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUser;
use App\Models\Company;
use App\Models\Department;
use App\Models\Direction;
use App\Models\Management;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $repository, $role;

    public function __construct(User $userRole, Role $role)
    {
        $this->repository = $userRole;
        $this->role = $role;
    }

    public function index($idRole, $idUser = null)
    {

        if (!$role = $this->role->where('id', $idRole)->first()) {
            return redirect()->back();
        }
        if ($idUser !== null) {
            $users = $role->users()->where('id', $idUser)->paginate();
        } else {
            $users = $role->users()->paginate();
        }

        return view('admin.pages.users.index', [
            'role'    => $role,
            'users' => $users,
        ]);
    }

    public function usersAllList()
    {
        if (!$roles = $this->role->all()) {
            return redirect()->back();
        }

        $users = array();

        foreach ($roles as $key => $role) {
            if (!$user = $role->users()->where('role_id', $role->id)->paginate()) {
                return redirect()->back();
            }

            $users[$key] = $user;
        }

        //dd($roles);

        return view('admin.pages.users.all_list', [
            'roles' => $roles,
            'users' => $users,
        ]);
    }

    public function create($idRole)
    {
        if (!$role = $this->role->where('id', $idRole)->first()) {
            return redirect()->back();
        }

        $rolesSelects = $this->role->all();

        $directions = Direction::all();
        $managements = Management::all();
        $departments = Department::all();

        return view('admin.pages.users.create', [
            'role' => $role,
            'rolesSelects' => $rolesSelects,
            'directions' => $directions,
            'managements' => $managements,
            'departments' => $departments,
        ]);
    }

    public function store(StoreUpdateUser $request)
    {
        if (!$role = $this->role->where('id', $request->role_id)->first()) {
            return redirect()->back();
        }

        if (!$company = Company::where('id', auth()->user()->company_id)->first('id')) {
            return redirect()->back();
        }

        $data=[];
        $data = $request->all();
        $data['company_id'] = $company->id;
        $data['password'] = bcrypt('123456');

        if ($nameSection = Direction::where('name_direction', $request->section_name)->first('name_direction')) {

            $data['section_name'] = $nameSection->name_direction;

        }elseif ($nameSection = Management::where('name_management', $request->section_name)->first('name_management')) {

            $data['section_name'] = $nameSection->name_management;

        }elseif ($nameSection = Department::where('name_department', $request->section_name)->first('name_department')) {

            $data['section_name'] = $nameSection->name_department;

        } else {
            return redirect()
                    ->back()
                    ->with('warning', "This section dont't exist in database!");
        }

        $role->users()->create($data);

        return redirect()
                    ->route('users.role.index', $role->id)
                    ->with('message', 'Usuário criado com sucesso!');
    }

    public function show($idRole, $idUser)
    {
        $role = $this->role->where('id', $idRole)->first();
        $user = $this->repository->find($idUser);

        if (!$role || !$user) {
            return redirect()->back();
        }

        return view('admin.pages.users.show', [
            'role' => $role,
            'user' => $user,
        ]);
    }

    public function destroy($idRole, $idUser)
    {
        $role = $this->role->where('id', $idRole)->first();
        $user = $this->repository->find($idUser);

        if (!$role || !$user) {
            return redirect()->back();
        }

        $user->delete();

        return redirect()
                    ->route('users.role.index', $role->id)
                    ->with('message', 'Registro deletado com sucesso!');
    }

    public function search(Request $request, $idRole)
    {
        if (!$role = $this->role->where('id', $idRole)->first()) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $users = $this->repository->search($request->filter, $role->id);

        return view('admin.pages.users.index', [
            'role'    => $role,
            'users' => $users,
            'filters'   => $filters,
        ]);
    }

    public function edit($idRole, $idUser)
    {
        $role = $this->role->where('id', $idRole)->first();
        $user = $this->repository->find($idUser);

        if (!$role || !$user) {
            return redirect()->back();
        }

        $rolesSelects = $this->role->all();

        $directions = Direction::all();
        $managements = Management::all();
        $departments = Department::all();

        return view('admin.pages.users.edit', [
            'role' => $role,
            'user' => $user,
            'rolesSelects' => $rolesSelects,
            'directions' => $directions,
            'managements' => $managements,
            'departments' => $departments,
        ]);
    }

    public function update(StoreUpdateUser $request, $idRole, $idUser)
    {

        $role = $this->role->where('id', $idRole)->first();
        $users = $this->repository->find($idUser);

        if (!$role || !$users) {
            return redirect()->back();
        }

        $users->update($request->all());

        return redirect()->route('users.role.index', $users->role_id);
    }
}
