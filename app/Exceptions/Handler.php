<?php

namespace App\Exceptions;

use App\Http\Response\PreConfigResponse;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
        MethodNotAllowedHttpException::class
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
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
            //
        });
    }

    public function render($request, Throwable $e)
    {
        if( $e instanceof MethodNotAllowedHttpException ){
            return resolve(PreConfigResponse::class)->getByCode(405)->getResponse();
        }

        \Log::error('Exception in app: '.$e->getMessage(), ['exception' => $e]);
        return resolve(PreConfigResponse::class)->getByCode(500)->getResponse();
//        return parent::render($request, $e);
    }
}
