<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\NewsletterMember;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Load home page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('front.' . __stg('template') . '.home');
    }

    /**
     *
     */
    public function newsletter(Request $request)
    {
        $data = $request->validate([
            'identifier' => 'required|string|max:255|email'
        ]);

        if (NewsletterMember::where('identifier', $data['identifier'])->count() == 0)
            NewsletterMember::create($data);

        return redirect()->back()->with(['message' => 'عضویت در خبر نامه با موفقیت انجام شد!']);
    }

    /**
     * Store contact form
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function contact(Request $request)
    {
        __sanitize('mobile');
        __sanitize('subject');
        __sanitize('name');
        __sanitize('message');

        $rules = [
            'mobile' => 'sometimes|nullable|string|max:20|min:4',
            'email' => 'required|string|email|min:4|max:191',
            'subject' => 'sometime|nullable|string|min:1|max:191',
            'name' => 'required|string|min:1|max:191',
            'message' => 'required|string|min:1|max:2000',
        ];

        $contact = Contact::create($request->validate($rules, [], [
            'mobile' => 'موبایل',
            'email' => 'ایمیل',
            'subject' => 'موضوع',
            'name' => 'نام',
            'message' => 'متن پیام',
        ]));

        return redirect()->back()->with(['message' => 'فرم تماس با موفقیت ارسال شد!']);
    }
}
