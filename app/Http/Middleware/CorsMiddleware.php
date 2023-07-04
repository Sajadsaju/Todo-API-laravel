<?php


namespace App\Http\Middleware;

class CorsMiddleware
{
    public function handle($request, \Closure $next)
    {
        $response = $next($request);

        $response->header('Access-Control-Allow-Origin', 'http://localhost:3000'); // Replace with the actual origin URL of your React app
        $response->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE');
        $response->header('Access-Control-Allow-Headers', 'Content-Type');

        return $response;
    }
}
