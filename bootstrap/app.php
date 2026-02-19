<?php

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Inside bootstrap/app.php (Laravel 11) or Handler.php
        // $exceptions->render(function (ValidationException $e, Request $request) {
        //     return response()->json([
        //         "success" => false,
        //         "message" => $e->validator->errors()->first(),
        //         "data"    => $e->errors(), // Laravel's errors go into your 'data' field
        //     ], 422);
        // });

        // $exceptions->render(function (Throwable $e, Request $request) {
        //     return response()->json([
        //         "success" => false,
        //         "message" => "Server Error: " . $e->getMessage(),
        //         "data"    => null,
        //     ], 500);
        // });
        $exceptions->render(function (ValidationException $e, Request $request) {
            // ONLY return JSON if the request explicitly asks for it
            if ($request->expectsJson()) {
                return response()->json([
                    "success" => false,
                    "message" => $e->validator->errors()->first(),
                    "data"    => $e->errors(),
                ], 422);
            }

            // Otherwise, let Laravel handle it normally (redirect back with errors)
            return null;
        });

        $exceptions->render(function (Throwable $e, Request $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    "success" => false,
                    "message" => "Server Error: " . $e->getMessage(),
                    "data"    => null,
                ], 500);
            }

            // Otherwise, show the standard Laravel error page/Whoops page
            return null;
        });
    })
    ->create();
