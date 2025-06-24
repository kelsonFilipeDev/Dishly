<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSystemPassword
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->get('system_password_verified')) {
            return redirect('/admin')
                ->with('error', 'Por favor, verifica a senha do sistema primeiro.');
        }

        return $next($request);
    }
}