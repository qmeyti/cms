<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;

class AdminController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $pageTitle = 'داشبورد مدیریت';
        $breadcrumb = [];
        $pageBc = 'داشبورد';
        $pageSubtitle = '';

        return view('admin.dashboard',compact('pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }
}
