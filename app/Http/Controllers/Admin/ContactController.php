<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {

        $perPage = __stg('element_per_page', 25);

        __sanitize('search');

        $keyword = $request->get('search');

        if (!empty($keyword)) {
            $contacts = Contact::where('subject', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('mobile', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->latest()
                ->paginate($perPage);
        } else {
            $contacts = Contact::latest()->paginate($perPage);
        }

        $pageTitle = 'لیست تماس ها';
        $breadcrumb = [];
        $pageBc = 'لیست تماس ها';
        $pageSubtitle = 'در این لیست آخرین درخواست ها و تماس های دریافتی را مشاهده خواهید کرد.';

        return view('admin.contacts.index', compact('contacts','pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @param Contact $contact
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Contact $contact)
    {
        $contact->seen = 1;

        $contact->save();
        $pageTitle = 'نمایش تماس ها';
        $breadcrumb = [];
        $pageBc = 'نمایش تماس ها';
        $pageSubtitle = '';

        return view('admin.contacts.show', compact('contact','pageTitle', 'breadcrumb', 'pageBc', 'pageSubtitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * @param Contact $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('flash_message','تماس با موفقیت حذف شد!');
    }
}
