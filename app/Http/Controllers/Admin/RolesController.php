<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RolesController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $roles = Role::where('name', 'LIKE', "%$keyword%")->orWhere('label', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $roles = Role::latest()->paginate($perPage);
        }

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $permissions = Permission::select('id', 'name', 'label')->get()->pluck('label', 'name');

        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->merge(['name' => Str::slug((string)$request->input('name'))]);

        __sanitize('label');

        $data = $request->validate([
            'name' => 'required|string|max:100|min:1|unique:roles,name|regex:!^[a-zA-Z0-9\-_]+$!',
            'label' => 'required|string|max:100|min:1',
            'permissions' => 'sometimes|array',
            'permissions.*' => 'sometimes|string|max:100|exists:permissions,name',
        ],[],[
            'name' => 'عنوان نقش',
            'label' => 'برچسب',
            'permissions' => 'حقوق دسترسی',
        ]);

        $role = Role::create($data);

        $role->permissions()->detach();

        if ($request->has('permissions')) {
            foreach ($request->permissions as $permission_name) {
                $permission = Permission::whereName($permission_name)->first();
                $role->givePermissionTo($permission);
            }
        }

        return redirect('admin/roles')->with('flash_message', 'نقش کاربر با موفقیت ایجاد شد!');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);

        return view('admin.roles.show', compact('role'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::select('id', 'name', 'label')->get()->pluck('label', 'name');

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Role $role)
    {
        $request->merge(['name' => Str::slug((string)$request->input('name'))]);

        __sanitize('label');

        $data = $request->validate([
            'name' => 'required|string|max:100|min:1|regex:!^[a-zA-Z0-9\-_]+$!|unique:roles,name,'.$role->id,
            'label' => 'required|string|max:100|min:1',
            'permissions' => 'sometimes|array',
            'permissions.*' => 'sometimes|string|max:100|exists:permissions,name',
        ],[],[
            'name' => 'عنوان نقش',
            'label' => 'برچسب',
            'permissions' => 'حقوق دسترسی',
        ]);

        $role->update($data);

        $role->permissions()->detach();

        if ($request->has('permissions')) {
            foreach ($request->permissions as $permission_name) {
                $permission = Permission::whereName($permission_name)->first();
                $role->givePermissionTo($permission);
            }
        }

        return redirect('admin/roles')->with('flash_message', 'نقش کاربر با موفقیت ویرایش شد!');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Role::destroy($id);

        return redirect('admin/roles')->with('flash_message', 'نقش کاربر با موفقیت حذف شد!');
    }
}
