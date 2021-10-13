<?php

namespace App\Exceptions;

use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Exception;

class Handler extends ExceptionHandler
{
    const DEFAULT_EXCEPTION    = 0;
    const INVALID_FORM_REQUEST = 1;
    const QUERY_EXCEPTION      = 2;

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
        return parent::render($request, $exception);
    }

    public static function handleException(Exception $exception) {
        return [
            'exception' => $exception,
            'message'   => $exception->getMessage(),
            'line'      => $exception->getLine()
        ];
    }

    public static function handleQueryException(Exception $exception) {


        if ($exception->errorInfo[0] === '23503') {
            preg_match_all("/tb\w+/", $exception->getMessage(), $matches);
            $tabelaRelacionamento = $matches[0][0];
            $tabelaPrincipal      = $matches[0][2];

            $mensagem = 'Não é possível excluir o registro da tabela "'.$tabelaPrincipal.'", ele está sendo referenciado pela entitade "'.$tabelaRelacionamento.'".';
        }

        return [
            'exception' => $exception,
            'message'   => $mensagem,
            'line'      => $exception->getLine()
        ];
    }

    public static function returnError(array $data, Exception $exception)
    {
        if ($exception instanceof Exception) {
            $aboutException = Handler::handleException($exception);
            $exceptionType = self::DEFAULT_EXCEPTION;
        }

        if ($exception instanceof QueryException) {
            $aboutException = Handler::handleQueryException($exception);
            $exceptionType = self::QUERY_EXCEPTION;

        }

        return array_merge(
            [
                'success' => false,
                'type' => $exceptionType
            ],
            $data,
            [
                'error' => $aboutException
            ]
        );
    }

    public static function getHttpStatusCode(Exception $exception)
    {
        if ($exception instanceof QueryException) {
            return 401;
        }

        return $exception->getCode() !== 0 ? $exception->getCode() : 400;
    }

    protected function invalidJson($request, Exception $exception)
    {
        return response()->json([
            'success' => false,
            'type'    => self::INVALID_FORM_REQUEST,
            'message' => 'Os dados informados são inválidos.',
            'errors'  => $exception->errors(),
        ], $exception->status);
    }
}
