<?php

namespace App\Http\Middleware;

use Closure;

class IsExaminer
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
        if(auth()->user()->is_examiner == 1){
            return $next($request);
        }

        return redirect('examiner.dashboard')->with('error',"You don't have examiner access.");
    }
}
