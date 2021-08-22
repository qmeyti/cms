<?php

namespace App\Libraries\Template;

use Illuminate\Http\Request;

/**
 * Interface for templates settings controller
 */
interface TemplateControllerInterface
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request);

    /**
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request);
}
