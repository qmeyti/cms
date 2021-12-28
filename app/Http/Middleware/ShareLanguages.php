<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Illuminate\Support\Facades\View;
use Closure;
use Illuminate\Http\Request;

class ShareLanguages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $languages=Language::all();
        View::share ( 'languages', $languages );

        return $next($request);
    }
}
