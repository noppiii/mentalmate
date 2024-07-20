<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RouteNotFoundException extends ExceptionHandler
{
    // /**
    //  * A list of the exception types that are not reported.
    //  *
    //  * @var array<int, class-string<Throwable>>
    //  */
    // protected $dontReport = [
    //     //
    // ];

    // /**
    //  * A list of the inputs that are never flashed for validation exceptions.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $dontFlash = [
    //     'current_password',
    //     'password',
    //     'password_confirmation',
    // ];

    // /**
    //  * Register the exception handling callbacks for the application.
    //  */
    // public function register()
    // {
    //     $this->renderable(function (NotFoundHttpException $e, $request) {
    //         // Check if the message contains 'Route [login] not defined'
    //         if (strpos($e->getMessage(), 'Route [login] not defined') !== false) {
    //             // Redirect to signin route
    //             return redirect()->route('signin');
    //         }
    //     });

    //     $this->reportable(function (Throwable $e) {
    //         //
    //     });
    // }

    // /**
    //  * Render an exception into an HTTP response.
    //  */
    // public function render($request, Throwable $exception)
    // {
    //     if ($exception instanceof NotFoundHttpException && strpos($exception->getMessage(), 'Route [login] not defined') !== false) {
    //         return redirect()->route('signin');
    //     }

    //     return parent::render($request, $exception);
    // }
}