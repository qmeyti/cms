<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Http\Request;

class ActivityLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage =  __stg('element_per_page',  25);

        if (!empty($keyword)) {
            $activitylogs = Activity::where('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $activitylogs = Activity::latest()->paginate($perPage);
        }

        $pageTitle = 'لاگ تغییرات';
        $breadcrumb = [];
        $pageBc = 'لاگ تغییرات';
        $pageSubtitle = '';

        return view('admin.activitylogs.index', compact('activitylogs','pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $activitylog = Activity::findOrFail($id);

        $pageTitle = 'جزییات لاگ';
        $breadcrumb = [];
        $pageBc = 'جزییات لاگ';
        $pageSubtitle = '';
        return view('admin.activitylogs.show', compact('activitylog','pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Activity::destroy($id);

        return redirect('admin/activitylogs')->with('flash_message', 'Activity deleted!');
    }
}
