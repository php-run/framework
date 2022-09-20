<?php

namespace Run\Exceptions;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Throwable;

class Handler implements ExceptionHandler
{
    /**
     * Report or log an exception.
     *
     * @param \Throwable $e
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $e)
    {
        // TODO: Implement report() method.
    }

    /**
     * Determine if the exception should be reported.
     *
     * @param \Throwable $e
     * @return bool
     */
    public function shouldReport(Throwable $e)
    {
        // TODO: Implement shouldReport() method.
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Throwable $e
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $e)
    {
        // TODO: Implement render() method.
       throw   $e ;

    }

    /**
     * Render an exception to the console.
     *
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param \Throwable $e
     * @return void
     *
     * @internal This method is not meant to be used or overwritten outside the framework.
     */
    public function renderForConsole($output, Throwable $e)
    {
        // TODO: Implement renderForConsole() method.
    }
}