<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Module;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;


class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $modules = Module::where('name', 'LIKE', "%$keyword%")->orWhere('label', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $modules = Module::latest()->paginate($perPage);
        }

        $pageTitle = 'ماژول';
        $breadcrumb = [];
        $pageBc = 'ماژول ها';
        $pageSubtitle = '';

        // $per = Module::with('permissions')->find('17');
        // dd($per);
        return view('admin.modules.index', compact('modules', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $permissions = Permission::select('id', 'name', 'label')->get()->pluck('label', 'id');
        $pageTitle = 'ایجاد ماژول جدید';
        // $breadcrumb = [route('category.index') => 'دسترسی ها'];
        $pageBc = 'ایجاد ماژول';
        $pageSubtitle = '';

        return view('admin.modules.create',compact('permissions','pageTitle', 'pageBc', 'pageSubtitle'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // dd($request->permissions());

        $request->merge(['name' => Str::slug((string)$request->input('name'))]);

        __sanitize('label');

        $data = $request->validate([
            'name' => 'required|string|max:100|min:1|regex:!^[a-zA-Z0-9\-_]+$!|unique:modules,name',
            'label' => 'required|string|max:200|min:1|regex:!^[a-zA-Z0-9\-_]+$!|unique:modules,label',
            'status' => 'required|numeric|in:0,1',
            'permissions' => 'sometimes|array',
            'permissions.*' => 'sometimes|numeric|exists:permissions,id',


        ]);


        // $data->pemissions();

        // dd($data);
       $module = Module::create($data);

        // dd($data);

    //    dd($module->permissions());
    //    dd($request->permissions);
    //    dd($data->permissions);

       $module->permissions()->sync($request->permissions);

        return redirect('admin/modules')->with('flash_message', 'ماژول جدید ایجاد شد');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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



        return redirect('admin/modules')->with('flash_message', 'ماژول با موفقیت ویرایش شد!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Module::destroy($id);

        return redirect('admin/modules')->with('flash_message', 'ماژول حذف شد!');
    }
}
