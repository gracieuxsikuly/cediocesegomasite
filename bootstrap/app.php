<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
          $middleware->alias([
            // ... existing code ...
            'role' => \App\Http\Middleware\RoleMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (PostTooLargeException $exception, Request $request) {
            $message = 'Le fichier est trop volumineux pour la configuration actuelle du serveur. Limite PHP actuelle: post_max_size='.ini_get('post_max_size').', upload_max_filesize='.ini_get('upload_max_filesize').'.';

            if ($request->is('livewire/upload-file') || $request->expectsJson()) {
                return response()->json([
                    'message' => $message,
                    'errors' => [
                        'files.0' => [$message],
                    ],
                ], 422);
            }

            return back()->withErrors(['fichier_audio' => $message]);
        });
    })->create();
