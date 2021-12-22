<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:show-users')->only(['index']);
        $this->middleware('can:create-users')->only(['create' , 'store']);
        $this->middleware('can:edit-users')->only(['edit' , 'update']);
        $this->middleware('can:delete-users')->only(['destroy']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $users = User::where('name', 'LIKE', "%$keyword%")->orWhere('email', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $users = User::latest()->paginate($perPage);
        }

        $pageTitle = 'کاربران';
        $breadcrumb = [];
        $pageBc = 'کاربران';
        $pageSubtitle = '';

        return view('admin.users.index', compact('users', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $roles = Role::select('id', 'name', 'label')->get();

        $roles = $roles->pluck('label', 'name');

        $pageTitle = 'ایجاد کاربر جدید';
        $breadcrumb = [route('users.index') => 'کاربران'];
        $pageBc = 'کاربر جدید';
        $pageSubtitle = '';

        return view('admin.users.create',  compact('roles','pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        __sanitize('name');
        __sanitize('family');
        __sanitize('nickname');
        __sanitize('username');
        __sanitize('about');

        $request->validate(
            [
                'name' => 'required|string|max:100',
                'family' => 'required|string|max:100',
                'email' => 'required|string|max:255|email|unique:users',
                'password' => 'required|string',
                'nickname' => 'nullable|string|max:255',
                'about' => 'nullable|string|max:1000',
                'username' => 'required|string|min:2|max:50|regex:!^[a-z]{1}[a-zA-Z0-9\-_]{1,49}$!|unique:users,username',
                'roles' => 'required|exists:roles,name',
                'avatar' => 'sometimes|nullable|url|max:2000|string',
            ], [], [
                'name' => 'نام',
                'family' => 'نام خانوادگی',
                'email' => 'ایمیل',
                'password' => 'رمز عبور',
                'roles' => 'نقش های کاربری',
                'avatar' => 'تصویر آواتار',
                'nickname' => 'نام نمایشی',
                'about' => 'درباره کاربر',
                'username' => 'نام کاربری',
            ]
        );

        $data = $request->except('password');

        $data['password'] = bcrypt($request->password);

        $data['username'] = strtolower($data['username']);

        $user = User::create($data);

        foreach ($request->roles as $role) {
            $user->assignRole($role);
        }

        return redirect('admin/users')->with('flash_message', 'کاربر با موفقیت اضافه شد!');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $pageTitle = 'نمایش اطلاعات کاربر';
        $breadcrumb = [route('users.index') => 'کاربران'];
        $pageBc = 'نمایش کاربر';

        $pageSubtitle = $user->name .' '. $user->family;

        return view('admin.users.show', compact('user', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $roles = Role::select('id', 'name', 'label')->get();

        $roles = $roles->pluck('label', 'name');

        $user = User::with('roles')->findOrFail($id);

        $user_roles = [];

        foreach ($user->roles as $role) {
            $user_roles[] = $role->name;
        }

        $pageTitle = 'ویرایش اطلاعات کاربر';

        $breadcrumb = [route('users.index') => 'کاربران'];

        $pageBc = 'ویرایش کاربر';

        $pageSubtitle = '';

        return view('admin.users.edit', compact('user', 'roles', 'user_roles','pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, User $user)
    {
        __sanitize('name');
        __sanitize('family');
        __sanitize('nickname');
        __sanitize('username');
        __sanitize('about');

        $request->validate(
            [
                'name' => 'required|string|max:100',
                'family' => 'required|string|max:100',
                'email' => 'required|string|max:255|email|unique:users,email,' . $user->id,
                'password' => 'sometimes|nullable|string',
                'nickname' => 'nullable|string|max:255',
                'about' => 'nullable|string|max:1000',
                'username' => 'required|string|min:2|max:50|regex:!^[a-z]{1}[a-zA-Z0-9\-_]{1,49}$!|unique:users,username,'.$user->id,
                'roles' => 'required|exists:roles,name',
                'avatar' => 'sometimes|nullable|url|max:2000|string',
            ], [], [
                'name' => 'نام',
                'family' => 'نام خانوادگی',
                'email' => 'ایمیل',
                'password' => 'رمز عبور',
                'roles' => 'نقش های کاربری',
                'avatar' => 'تصویر آواتار',
                'nickname' => 'نام نمایشی',
                'about' => 'درباره کاربر',
                'username' => 'نام کاربری',
            ]
        );

        $data = $request->except('password');

        $data['username'] = strtolower($data['username']);

        if ($request->has('password') && !empty($data['password'])) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        $user->roles()->detach();
        foreach ($request->roles as $role) {
            $user->assignRole($role);
        }

        return redirect('admin/users')->with('flash_message', 'اطلاعات کاربر با موفقیت بروزرسانی شد!');
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(User $user)
    {
        if ($user->id == auth()->id())
            return redirect('admin/users')->with('flash_error', 'شما نمی توانید حساب کاربری خود را حذف کنید!');

        $user->delete();

        return redirect('admin/users')->with('flash_message', 'کاربر با موفقیت حذف شد!');
    }
}
