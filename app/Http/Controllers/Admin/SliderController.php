<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
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
            $slider = Slider::where('title', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $slider = Slider::latest()->paginate($perPage);
        }

        $pageTitle = 'لیست اسلایدرها';
        $breadcrumb = [];
        $pageBc = 'لیست اسلایدرها';
        $pageSubtitle = '';

        return view('admin.slider.index', compact('slider', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $pageTitle = 'افزودن اسلایدر';
        $breadcrumb = [route('sliders.index') => 'لیست اسلایدرها'];
        $pageBc = 'افزودن اسلایدر';
        $pageSubtitle = '';

        return view('admin.slider.create', compact('pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        __sanitize('title');

        $data = $request->validate(['title' => 'required|string|min:2|max:255']);

        Slider::create($data);

        return redirect()->route('sliders.index')->with('flash_message', 'اسلایدر جدید با موفقیت ایجاد شد!');
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
        $slider = Slider::findOrFail($id);

        $pageTitle = 'نمایش اسلایدر';
        $breadcrumb = [route('sliders.index') => 'لیست اسلایدرها'];
        $pageBc = 'نمایش اسلایدر';
        $pageSubtitle = '';

        return view('admin.slider.show', compact('slider', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);

        $pageTitle = 'ویرایش اسلایدر';
        $breadcrumb = [route('sliders.index') => 'لیست اسلایدرها'];
        $pageBc = 'ویرایش اسلایدر';
        $pageSubtitle = '';

        return view('admin.slider.edit', compact('slider', 'pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * @param Request $request
     * @param Slider $slider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Slider $slider)
    {
        __sanitize('title');

        $data = $request->validate(['title' => 'required|string|min:2|max:255']);

        $slider->update($data);

        return redirect()->route('sliders.index')->with('flash_message', 'Slider updated!');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Slider::destroy($id);

        return redirect()->route('sliders.index')->with('flash_message', 'Slider deleted!');
    }
}
