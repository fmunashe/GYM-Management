<?php

namespace App\Http\Middleware;

use App\Enums\UserTypeEnum;
use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->user_type == UserTypeEnum::ADMIN) {
            return $next($request);
        }
        return redirect('home')->with('error', "You don't have the required access to perform that action.");
    }
}
