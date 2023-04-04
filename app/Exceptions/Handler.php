<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    // public function render($request, Throwable $exception)
    // {
    //     if ($request->is("admin") || $request->is('admin/*')) {
    //         return redirect()->guest("/admin/login");
    //     }
    //     return parent::render($request, $exception);
    // }
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            
        });
        
        
    }
    protected function redirectTo($request)
{
    if (Auth::guard('admin')->check() && $request->routeIs('admin.*')) {
        return route('admin.cart'); 
    }

    if (! $request->expectsJson() && ! $request->routeIs('admin.login')) {
        return route('login');
    }

    if (! $request->expectsJson()) {
        return route('admin.login');
    }
}
 
}
