<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use App\Models\Slider;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request, Slider $slider)
    {
        $keyword = $request->get('search');

        $perPage = 25;

        $slide = $slider->slides();

        if (!empty($keyword)) {

            $slide = $slide->where('header', 'LIKE', "%$keyword%")
                ->orWhere('text1', 'LIKE', "%$keyword%")
                ->orWhere('text2', 'LIKE', "%$keyword%")
                ->latest()
                ->paginate($perPage);

        } else {

            $slide = $slide->latest()->paginate($perPage);

        }

        return view('admin.slide.index', compact('slide', 'slider'));
    }

    /**
     * @param Request $request
     * @param Slider $slider
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request, Slider $slider)
    {
        return view('admin.slide.create', compact('slider'));
    }

    /**
     * @param Request $request
     * @param Slider $slider
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Slider $slider)
    {
        __sanitize('header');
        __sanitize('text1');
        __sanitize('text2');

        $data = $this->validate($request, [
            'header' => 'required|string|max:255',
            'text1' => 'sometimes|nullable|string|max:2000',
            'text2' => 'sometimes|nullable|string|max:2000',
            'url' => 'sometimes|nullable|url|max:2000',
            'image' => 'required|string|url|max:2000',
        ], [], [
            'header' => 'عنوان اسلاید',
            'text1' => 'توضیحات ۱',
            'text2' => 'توضیحات ۲',
            'url' => 'آدرس اینترنتی',
            'image' => 'تصویر اسلاید',
        ]);

        $slider->slides()->create($data);

        return redirect()->route('slides.index', ['slider' => $slider->id])->with('flash_message', 'اسلاید جدید با موفقیت ساخته شد.');
    }

    /**
     * @param Request $request
     * @param Slider $slider
     * @param Slide $slide
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, Slider $slider, Slide $slide)
    {
        return view('admin.slide.show', compact('slide', 'slider'));
    }

    /**
     * @param Request $request
     * @param Slider $slider
     * @param Slide $slide
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, Slider $slider, Slide $slide)
    {
        return view('admin.slide.edit', compact('slide','slider'));
    }

    /**
     * @param Request $request
     * @param Slider $slider
     * @param Slide $slide
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Slider $slider, Slide $slide)
    {
        __sanitize('header');
        __sanitize('text1');
        __sanitize('text2');

        $data = $this->validate($request, [
            'header' => 'required|string|max:255',
            'text1' => 'sometimes|nullable|string|max:2000',
            'text2' => 'sometimes|nullable|string|max:2000',
            'url' => 'sometimes|nullable|url|max:2000',
            'image' => 'required|string|url|max:2000',
        ], [], [
            'header' => 'عنوان اسلاید',
            'text1' => 'توضیحات ۱',
            'text2' => 'توضیحات ۲',
            'url' => 'آدرس اینترنتی',
            'image' => 'تصویر اسلاید',
        ]);

        $slide->update($data);

        return redirect()->route('slides.index', ['slider' => $slider->id])->with('flash_message', 'ویرایش اسلاید انجام شد!');
    }

    /**
     * @param Request $request
     * @param Slider $slider
     * @param Slide $slide
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Slider $slider, Slide $slide)
    {
        $slide->delete();

        return redirect()->route('slides.index', ['slider' => $slider->id])->with('flash_message', 'اسلاید حذف شد!');
    }
}
