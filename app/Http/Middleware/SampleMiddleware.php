<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SampleMiddleware
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
        /**
         * 前に処理を挟みたい場合はここに記述
         */
        return $next($request);//Controllerが実行したい所定の処理
        /**
         * 後に処理を挟みたい場合はここに記述
         */
    }
}
