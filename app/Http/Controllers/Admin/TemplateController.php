<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TemplateController extends Controller
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
     * @param Request $request
     * @param string $module
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function create(Request $request, string $module)
    {
        /**
         * Check file module name
         */
        if (!preg_match('!^[a-zA-Z0-9_]+$!', $module)) {
            abort(404);
        }

        $template = __stg('template');

        if (!empty($template)) {

            /**
             * Template module controller name
             */
            $controller = ucfirst(strtolower($module)) . 'Controller';

            /**
             * Find template module controller
             */
            if (File::exists($viewFile = base_path("resources/views/front/{$template}/setting/module_logic/{$controller}.php"))) {

                /**
                 * Load template module controller
                 */
                require_once($viewFile);

                $object = new $controller();

                return $object->create($request);

            } else {

                abort(404, 'فایل تنظیمات قالب پیدا نشد!');

            }

        }

        abort(500, 'قالب انتخاب نشده است!');
    }

    /**
     * @param Request $request
     * @param string $module
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function store(Request $request, string $module)
    {
        /**
         * Check file module name
         */
        if (!preg_match('!^[a-zA-Z0-9_]+$!', $module)) {
            abort(404);
        }

        $template = __stg('template');

        if (!empty($template)) {

            /**
             * Template module controller name
             */
            $controller = ucfirst(strtolower($module)) . 'Controller';

            /**
             * Find template module controller
             */
            if (File::exists($viewFile = base_path("resources/views/front/{$template}/setting/module_logic/{$controller}.php"))) {

                /**
                 * Load template module controller
                 */
                require_once($viewFile);

                $object = new $controller();

                return $object->store($request);

            } else {

                abort(404, 'فایل تنظیمات قالب پیدا نشد!');

            }

        }

        abort(500, 'قالب انتخاب نشده است!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
