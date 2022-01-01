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
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $module = Module::findOrFail($id);
        $pageTitle = 'مشاهده ماژول';
        $breadcrumb = [route('modules.index') => 'لیست نقش ها'];
        $pageBc = 'ماژول';
        $pageSubtitle = '';
        return view('admin.modules.show', compact('module', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $module = module::findOrFail($id);
        $permissions = Permission::select('id', 'name', 'label')->get()->pluck('label', 'id');
        $pageTitle = 'ویرایش ماژول';
        $breadcrumb = [route('modules.index') => 'لیست ماژول ها'];
        $pageBc = 'ویرایش ماژول';
        $pageSubtitle = '';
        return view('admin.modules.edit', compact('module', 'permissions', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * @param Request $request
     * @param Module $module
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Module $module)
    {
        $request->merge(['name' => Str::slug((string)$request->input('name'))]);

        __sanitize('label');

        $data = $request->validate([
            'name' => 'required|string|max:100|min:1|regex:!^[a-zA-Z0-9\-_]+$!|unique:roles,name,' . $module->id,
            'label' => 'required|string|max:100|min:1',
            'permissions' => 'sometimes|array',
            'permissions.*' => 'sometimes|numeric|exists:permissions,id',
        ], [], [
            'name' => 'عنوان ماژول',
            'label' => 'برچسب',
            'permissions' => 'حقوق دسترسی',
        ]);

        $module->update($data);

        $module->permissions()->sync($request->permissions);

        return redirect()->with('flash_message', 'ماژول با موفقیت ویرایش شد!');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Module::destroy($id);

        return redirect()->route('modules.index')->with('flash_message', 'ماژول حذف شد!');
    }
}
