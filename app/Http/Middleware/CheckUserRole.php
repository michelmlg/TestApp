<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = ['id' => 123, 'name' => 'Gio', 'role' => 'teste'];

        if($user['role'] === 'admin'){
            return $next($request);
        }

        //throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException(); Ao invés disso use abort(404);
        abort(404);
    }
}
