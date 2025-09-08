<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use App\Http\Middleware\CheckRole;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Ici, tu peux ajouter uniquement les middlewares existants
    ];

    protected $middlewareGroups = [
        'web' => [
            // Par exemple, vérification CSRF si VerifyCsrfToken existe
        ],
        'api' => [
            // Group API minimal
        ],
    ];

    protected $routeMiddleware = [
        'role' => CheckRole::class,
    ];
}
