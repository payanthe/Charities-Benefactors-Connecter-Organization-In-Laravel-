<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsBenefactor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $user = Auth::user();
        if(!Auth::guest()){
            if( !$user -> isBenefactor() ){
                return redirect()->intended('/');
            }
            return $next($request);
        }
        return redirect('login');

    }
}
