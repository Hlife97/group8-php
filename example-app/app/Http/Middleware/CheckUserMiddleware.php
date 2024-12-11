<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = ['id'=>1, 'name'=> 'John', 'email'=> 'john@example.com', 'role'=> 'user'];
        if($user['role'] != 'admin'){
            abort(404);
        }
        return $next($request);
    }
}
