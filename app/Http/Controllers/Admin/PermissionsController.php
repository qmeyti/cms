<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermissionsController extends Controller
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
            $permissions = Permission::where('name', 'LIKE', "%$keyword%")->orWhere('label', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $permissions = Permission::latest()->paginate($perPage);
        }

        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.permissions.create');
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
            'name' => 'required|string|max:100|min:1|regex:!^[a-zA-Z0-9\-_]+$!|unique:permissions,name',
            'label' => 'required'
        ]);

        Permission::create($data);

        return redirect('admin/permissions')->with('flash_message', 'حق دسترسی ایجاد شد!');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $permission = Permission::findOrFail($id);

        return view('admin.permissions.show', compact('permission'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * @param Request $request
     * @param Permission $permission
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Permission $permission)
    {
        $request->merge(['name' => Str::slug((string)$request->input('name'))]);

        __sanitize('label');

        $data = $request->validate([
            'name' => 'required|string|max:100|min:1|regex:!^[a-zA-Z0-9\-_]+$!|unique:permissions,name,' . $permission->id,
            'label' => 'required'
        ]);

        $permission->update($data);

        return redirect('admin/permissions')->with('flash_message', 'حق دسترسی ویرایش شد!');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Permission::destroy($id);

        return redirect('admin/permissions')->with('flash_message', 'حق دسترسی حذف شد!');
    }
}
