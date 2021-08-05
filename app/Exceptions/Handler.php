<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        //JWT
        if ($exception instanceof UnauthorizedHttpException) {

            $preException = $exception->getPrevious();

            if ($preException instanceof TokenExpiredException) {
                return response()->json([
                    'error' => 'TOKEN_EXPIRED',
                    'msg' => 'El token ha expirado, actualícelo'
                ], 401);
            } else if ($preException instanceof TokenInvalidException) {

                return response()->json([
                    'error' => 'TOKEN_INVALID',
                    'msg' => 'El token enviado es inválido'
                ], 401);
            } else if ($preException instanceof TokenBlacklistedException) {

                return response()->json([
                    'error' => 'TOKEN_BLACKLISTED',
                    'msg' => 'Este token hace parte de la lista negra, actualícelo.'
                ], 401);
            }
        }

        if ($exception->getMessage() === 'Token not provided') {

            return response()->json([
                'error' => 'TOKEN_NOT_PROVIDED',
                'msg' => 'Falta el token para acceder al recurso'
            ], 401);
        }

        //Validation Form Request
        if ($exception instanceof ValidationException) {

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Se generaron errores de validación',
                    'data' => ['errors' => $exception->errors()]
                ],
                JsonResponse::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        //Http Not Found
        if ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'status' => false,
                'message' => 'Ruta no encontrada... Por favor, verifique la ruta.',
            ], 404);
        }

        //Other exception
        if ($exception->getCode() != 200) {
            $code = $exception->getCode() > 99 && $exception->getCode() < 512 ?
            $exception->getCode() : 500;

            DB::rollBack();

            //Business rules
            if ($code == 423) {
                return response()->json([
                    'status' => false,
                    'message' => $exception->getMessage(),
                ], $code);
            }

            return response()->json([
                'status' => false,
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'previous' => $exception->getPrevious(),
                'trace' => $exception->getTrace(),
            ], $code);
        }

        return parent::render($request, $exception);
    }
}
