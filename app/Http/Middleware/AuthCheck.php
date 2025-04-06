<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $status = Http::withHeaders([
            'Authorization' => 'Bearer ' . $request->cookie('auth_token')
        ])->get(env('APP_URL') . '/auth/api/check');
        if (!$status->json()['authenticated'])
            return redirect('/login')->with('error', 'Перед посещением той страницы необходимо авторизоваться');

        return $next($request);
    }
}
