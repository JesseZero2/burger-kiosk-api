<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        $validKey = env('API_KEY');
        $apiKey = $request->header('apikey');

        $bearerToken = $request->bearerToken();


        if ($apiKey !== $validKey && $bearerToken !== $validKey) {

            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);

        }

        return $next($request);
    }
}