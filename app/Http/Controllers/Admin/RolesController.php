<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RolesController extends Controller
{
	public function index(Request $request)
	{
		abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		if ($request->ajax()) {
			$roles = Role::with('permissions')->get();

			return DataTables::of($roles)
				->addColumn('permissions', function (Role $role) {
					return $role->permissions->pluck('title')->implode(', ');
				})
				->addColumn('action', function (Role $role) {
					return '
					<div class="d-flex flex flex-row justify-content-center">
						<a href="' . route('admin.roles.show', $role->id) . '" class="mr-5 btn btn-sm btn-icon btn-primary" title="' . trans('global.view') . '">
							<i class="fal fa-eye"></i>
						</a>
                        <a href="' . route('admin.roles.edit', $role->id) . '" class="mr-2 btn btn-sm btn-info btn-icon" title="' . trans('global.edit') . '">
							<i class="fal fa-edit"></i>
						</a>
                        <form action="' . route('admin.roles.destroy', $role->id) . '" method="POST" onsubmit="return confirm(\'' . trans('global.areYouSure') . '\');" style="display: inline-block;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="' . csrf_token() . '">
							<button class="ml-1 btn btn-sm btn-danger btn-icon" type="submit"><i class="fal fa-trash"></i></button>
                        </form>
					</div>';
				})
				->rawColumns(['action'])
				->make(true);
		}

		return view('admin.roles.index');
	}

	public function create()
	{
		abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$permissions = Permission::pluck('title', 'id');

		return view('admin.roles.create', compact('permissions'));
	}

	public function store(StoreRoleRequest $request)
	{
		$role = Role::create($request->all());
		$role->permissions()->sync($request->input('permissions', []));

		return redirect()->route('admin.roles.index');
	}

	public function edit(Role $role)
	{
		abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$permissions = Permission::pluck('title', 'id');

		$role->load('permissions');

		return view('admin.roles.edit', compact('permissions', 'role'));
	}

	public function update(UpdateRoleRequest $request, Role $role)
	{
		$role->update($request->all());
		$role->permissions()->sync($request->input('permissions', []));

		return redirect()->route('admin.roles.index');
	}

	public function show(Role $role)
	{
		abort_if(Gate::denies('role_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$role->load('permissions');

		return view('admin.roles.show', compact('role'));
	}

	public function destroy(Role $role)
	{
		abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$role->delete();

		return back();
	}

	public function massDestroy(MassDestroyRoleRequest $request)
	{
		Role::whereIn('id', request('ids'))->delete();

		return response(null, Response::HTTP_NO_CONTENT);
	}
}
