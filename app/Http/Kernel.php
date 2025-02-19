<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        // Handles request initialization
        \Illuminate\Foundation\Http\Middleware\HandleCors::class,
        // Checks if the application is in maintenance mode
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        // Adds encryption to cookies
        \Illuminate\Cookie\Middleware\EncryptCookies::class,
        // Handles cookie management
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        // Starts a session
        \Illuminate\Session\Middleware\StartSession::class,
        // Ensures POST requests have valid CSRF tokens
        \App\Http\Middleware\VerifyCsrfToken::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'admin' => \App\Http\Middleware\AdminMiddleware::class, // Example of custom middleware
    ];
}
