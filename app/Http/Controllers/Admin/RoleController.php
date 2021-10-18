<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateRole;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private $repository;

    public function __construct(Role $role, User $userRole)
    {
        $this->repository = $role;
        $this->user = $userRole;
    }

    public function index()
    {
        $roles = $this->repository->latest()->paginate();

        return view('admin.pages.roles.index', [
            'roles' => $roles,
        ]);
    }

    public function create()
    {
        return view('admin.pages.roles.create');
    }

    public function store(StoreUpdateRole $request)
    {
        $data = $request->all();

        $this->repository->create($data);

        return redirect()->route('roles.index');
    }

    public function destroy($roleId)
    {
        $role = $this->repository->where('id', $roleId)->first();
        $users = $this->user->where('role_id', $role->id)->first();

        if (!$role) {
            return redirect()->back();
        }

        if ($users) {
            return redirect()
                        ->back()
                        ->with('error', 'Existem usuários cadastradas nesta função, portando não é possível deletar!');
        }

        $role->delete();

        return redirect()->route('roles.index');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $roles = $this->repository->search($request->filter);

        return view('admin.pages.roles.index', [
            'roles' => $roles,
            'filters'   => $filters,
        ]);
    }

    public function edit($roleId)
    {
        $role = $this->repository->where('id', $roleId)->first();

        if (!$role) {
            return redirect()->back();
        }

        return view('admin.pages.roles.edit', [
            'role' => $role
        ]);
    }

    public function update(StoreUpdateRole $request, $roleId)
    {

        if (!$role = $this->repository->where('id', $roleId)->first()) {
            return redirect()->back();
        }

        $data = $request->all();

        $role->update($data);

        return redirect()->route('roles.index');
    }
}
