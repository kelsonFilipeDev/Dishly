<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;
use App\Http\Controllers\Controller;

class VerifySystemPasswordController extends Controller
{
    // Mostra o formulário da senha do sistema
    public function showSystemPasswordPrompt()
    {
        return Inertia::render('Admin/VerifySystemPassword');
    }

    // Verifica a SYSTEM_PASSWORD com limite de tentativas por IP
    public function verifySystemPassword(Request $request)
    {
        $request->validate([
            'system_password' => 'required|string',
        ]);

        $clientIp = $request->ip();
        $attemptsKey = "admin_register_attempts_{$clientIp}";
        $blockedKey = "admin_register_blocked_{$clientIp}";

        // Se o IP está bloqueado
        if (Cache::has($blockedKey)) {
            return response()->json([
                'status' => 'blocked',
                'message' => 'O teu IP está temporariamente bloqueado. Contacta o desenvolvedor.'
            ], 403);
        }

        // Se a senha está errada
        if ($request->system_password !== env('SYSTEM_PASSWORD')) {
            $attempts = Cache::increment($attemptsKey);
            Cache::put($attemptsKey, $attempts, now()->addMinutes(15));

            if ($attempts >= 3) {
                Cache::put($blockedKey, true, now()->addHour());
                return response()->json([
                    'status' => 'blocked',
                    'message' => 'Tentaste 3 vezes. O teu IP foi bloqueado.'
                ], 403);
            }

            return response()->json([
                'status' => 'error',
                'message' => 'Senha do sistema incorreta.'
            ], 401);
        }

        // Senha correta: reset tentativas e autoriza sessão
        Cache::forget($attemptsKey);
        session(['system_password_verified' => true]);

        return response()->json([
            'status' => 'success',
            'message' => 'Senha correta. Podes continuar com o registo.'
        ]);
    }
}
