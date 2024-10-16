<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->alias ([
            'user_level' => \App\Http\Middleware\CheckuserMiddleware::class,
            'last_seen' => \App\Http\Middleware\last_seenMiddelware::class,
            'inactive'  => \App\Http\Middleware\inactiveMiddleware::class,
            'admin' =>  \App\Http\Middleware\AdminMiddleware::class,
            'parent' => \App\Http\Middleware\parentMiddleware::class,
            'accountant' => \App\Http\Middleware\accountantMiddleware::class,
            'student' => \App\Http\Middleware\studentMiddleware::class,
            'teacher' => \App\Http\Middleware\teacherMiddleware::class,
 
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
