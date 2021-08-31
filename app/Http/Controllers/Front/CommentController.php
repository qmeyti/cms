<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Page;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if(!(auth()->check() ||  __stg('guest_can_write_comment',false) == true)){
            abort(404);
        }

        /**
         * Check delay between send comments
         */
        if (auth()->check() && __stg('guest_can_write_comment',false) == false) {
            /**
             * Get last user comment
             */
            $last = Comment::where('user_id', auth()->id())->orderBy('id', 'desc')->first();

            if ($last !== null) {

                $dt = \DateTime::createFromFormat('Y-m-d H:i:s', $last->created_at);

                $ltm = $dt->getTimestamp();

                $delay = __stg('delay_between_comments_second', 120);
                /**
                 * Check user can send comment
                 */
                if (($ltm + $delay) > time()) {
                    return redirect()->back()->with(['error' => "شما در هر {$delay} ثانیه یکبار مجاز به ارسال دیدگاه هستید."]);
                }
            }
        }

        __sanitize('body');

        $rules = [
            'page_id' => 'required|integer|min:1|max:999999999999|exists:pages,id',
            'body' => 'required|string|min:1|max:2000'
        ];

        /**
         * Validate extra fields if user unauthorized
         */
        if (!auth()->check()) {
            __sanitize('name');

            $rules['email'] = 'required|string|email|max:191|min:4';
            $rules['name'] = 'required|string|max:191|min:2';
            $rules['mobile'] = 'sometimes|nullable|string|max:191|min:2';
        }

        $data = $request->validate($rules,[],[
            'body' => 'متن دیدگاه',
            'email' => 'ایمیل',
            'name' => 'نام',
            'mobile' => 'شماره همراه',
        ]);

        Comment::create([
            'body' => $data['body'],
            'page_id' => $data['page_id'],
            'user_id' => auth()->check() ? auth()->id() : null,
            'parent_id' => null,
            'depth' => 1,
            'status' => __stg('publish_comments_without_admin_permission',false) == true ? 'publish' : 'pending',
            'mobile' => $request->input('mobile',null),
            'email' => $request->input('email',null),
            'name' => $request->input('name',null)
        ]);

        return redirect()->back()->with(['message' => "دیدگاه با موفقیت ثبت شد!"]);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
