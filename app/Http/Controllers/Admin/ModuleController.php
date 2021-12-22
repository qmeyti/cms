<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\ACL\Permission;
use Illuminate\Support\Str;


class ModuleController extends Controller
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

            $modules = Module::where('name', 'LIKE', "%$keyword%")->orWhere('label', 'LIKE', "%$keyword%")->latest()->paginate($perPage);

        } else {
            $modules = Module::latest()->paginate($perPage);
        }

        $pageTitle = 'ماژول';
        $breadcrumb = [];
        $pageBc = 'ماژول ها';
        $pageSubtitle = '';

        return view('admin.modules.index', compact('modules', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {

        $permissions = Permission::select('id', 'name', 'label')->get()->pluck('label', 'id');

        $pageTitle = 'ایجاد ماژول جدید';
        $breadcrumb = [
            route('modules.index') => 'ماژول ها',
        ];
        $pageBc = 'ایجاد ماژول';
        $pageSubtitle = '';

        return view('admin.modules.create', compact('permissions', 'pageTitle', 'pageBc', 'pageSubtitle', 'breadcrumb'));

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->merge(['name' => Str::slug((string)$request->input('name'))]);

        __sanitize('label');

        $data = $request->validate([
            'name' => 'required|string|max:100|min:1|regex:!^[a-zA-Z0-9\-_]+$!|unique:modules,name',
            'label' => 'required|string|max:200|min:1',
            'status' => 'required|numeric|in:0,1',
            'permissions' => 'sometimes|array',
            'permissions.*' => 'sometimes|numeric|exists:permissions,id',
        ]);

        $module = Module::create($data);

        /**
         * Attach permissions to modules
         */
        if (isset($data['permissions']) && count($data['permissions']) > 0)
            $module->permissions()->sync($request->permissions);

        return redirect()->route('modules.index')->with('flash_message', 'ماژول جدید ایجاد شد');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
