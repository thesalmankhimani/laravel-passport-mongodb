<?php

namespace SalKhimani\LaravelPassportMongoDB\Http\Controllers;

use Throwable;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Container\Container;
use Zend\Diactoros\Response as Psr7Response;
use Illuminate\Contracts\Debug\ExceptionHandler;
use League\OAuth2\Server\Exception\OAuthServerException;
use Symfony\Component\Debug\Exception\FatalThrowableError;

trait HandlesOAuthErrors
{
    /**
     * Perform the given callback with exception handling.
     *
     * @param  \Closure  $callback
     * @return Response
     */
    protected function withErrorHandling($callback)
    {
        try {
            return $callback();
        } catch (OAuthServerException $e) {
            $this->exceptionHandler()->report($e);

            return $e->generateHttpResponse(new Psr7Response);
        } catch (Exception $e) {
            $this->exceptionHandler()->report($e);

            return new Response($e->getMessage(), 500);
        } catch (Throwable $e) {
            $this->exceptionHandler()->report(new FatalThrowableError($e));

            return new Response($e->getMessage(), 500);
        }
    }

    /**
     * Get the exception handler instance.
     *
     * @return \Illuminate\Contracts\Debug\ExceptionHandler
     */
    protected function exceptionHandler()
    {
        return Container::getInstance()->make(ExceptionHandler::class);
    }
}
