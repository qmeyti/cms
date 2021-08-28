<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');

        $perPage = __stg('element_per_page', 25);

        if (!empty($keyword)) {
            $settings = Setting::where('key', 'LIKE', "%$keyword%")
                ->orWhere('value', 'LIKE', "%$keyword%")
                ->orderBy('key')->paginate($perPage);
        } else {
            $settings = Setting::orderBy('key')->paginate($perPage);
        }

        $pageTitle = 'لیست تنظیمات';
        $breadcrumb = [];
        $pageBc = 'لیست تنظیمات';
        $pageSubtitle = '';

        return view('admin.settings.index', compact('settings', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $pageTitle = 'ایجاد تنظیم تنظیمات';
        $breadcrumb = [];
        $pageBc = 'ایجاد تنظیم';
        $pageSubtitle = '';
        return view('admin.settings.create', compact('pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $request->merge(['key' => Str::slug((string)$request->input('key', ''), '_')]);

        $data = $request->validate([
            'key' => 'required|string|max:255|unique:settings',
            'type' => 'required|string|in:text,bool,int,string,float,json',
            'part' => 'nullable|string|in:home,admin',
        ], [], [
            'key' => 'کلید',
            'part' => 'بخش مورد استفاده',
            'type' => 'نوع داده ای',
        ]);

        $rule = [];
        if ($data['type'] === 'int') {

            __num_sanitize('value');

            $rule['value'] = 'required|integer';

        } elseif ($data['type'] === 'float') {

            __num_sanitize('value');

            $rule['value'] = 'required|numeric';

        } elseif ($data['type'] === 'bool') {

            $rule['value'] = 'required|integer|in:0,1';

        } elseif ($data['type'] === 'string') {

            __sanitize('value');

            $rule['value'] = 'nullable|string|max:1000';

        } elseif ($data['type'] === 'text') {

            $rule['value'] = 'nullable|string';

        } elseif ($data['type'] === 'json') {

            $rule['value'] = ['string', function ($attribute, $value, $fail) {

                $obj = json_decode($value);

                if ($obj === null) {
                    $fail('ساختار JSON ارسال شده صحیح نیست!');
                }

            }];

        }

        $data['value'] = $request->validate($rule, [], ['value' => 'مقدار'])['value'];

        $data['user_id'] = auth()->id();

        if ($data['type'] === 'text') {

            $data['value'] = htmlentities($data['value'], ENT_QUOTES, 'UTF-8', false);

        }

        Setting::create($data);

        return redirect('admin/settings')->with('flash_message', 'تنظیم با موفقیت ایجاد شد!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $setting = Setting::findOrFail($id);
        $pageTitle = 'نمایش جزییات تنظیم';
        $breadcrumb = [];
        $pageBc = 'جزییات تنظیم';
        $pageSubtitle = '';
        return view('admin.settings.show', compact('setting', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * @param Setting $setting
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Setting $setting)
    {
        $pageTitle = 'ویرایش تنظیم';
        $breadcrumb = [];
        $pageBc = 'ویرایش تنظیم';
        $pageSubtitle = '';
        return view('admin.settings.edit', compact('setting', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * @param Request $request
     * @param Setting $setting
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Setting $setting)
    {
        $request->merge(['key' => Str::slug((string)$request->input('key', ''), '_')]);

        $data = $request->validate([
            'key' => 'required|string|max:255|unique:settings,key,' . $setting->id,
            'type' => 'required|string|in:text,bool,int,string,float,json',
            'part' => 'nullable|string|in:home,admin',
        ], [], [
            'key' => 'کلید',
            'part' => 'بخش مورد استفاده',
            'type' => 'نوع داده ای',
        ]);

        $rule = [];
        if ($data['type'] === 'int') {

            __num_sanitize('value');

            $rule['value'] = 'required|integer';

        } elseif ($data['type'] === 'float') {

            __num_sanitize('value');

            $rule['value'] = 'required|numeric';

        } elseif ($data['type'] === 'bool') {

            $rule['value'] = 'required|integer|in:0,1';

        } elseif ($data['type'] === 'string') {

            __sanitize('value');

            $rule['value'] = 'nullable|string|max:1000';

        } elseif ($data['type'] === 'text') {

            $rule['value'] = 'nullable|string';

        } elseif ($data['type'] === 'json') {

            $rule['value'] = ['string', function ($attribute, $value, $fail) {

                $obj = json_decode($value);

                if ($obj === null) {
                    $fail('ساختار JSON ارسال شده صحیح نیست!');
                }

            }];

        }

        $data['value'] = $request->validate($rule, [], ['value' => 'مقدار'])['value'];

        $data['user_id'] = auth()->id();

        if ($data['type'] === 'text') {

            $data['value'] = htmlentities($data['value'], ENT_QUOTES, 'UTF-8', false);

        }

        $setting->update($data);

        return redirect('admin/settings')->with('flash_message', 'ویرایش تنظیم انجام شد!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Setting::destroy($id);

        return redirect('admin/settings')->with('flash_message', 'تنظیم حذف شد!');
    }
}
