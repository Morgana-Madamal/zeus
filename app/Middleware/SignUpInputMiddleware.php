<?php

namespace Zeus\Middleware;

class SignUpInputMiddleware extends Middleware
{
    public function __invoke($request, $response, $next)
    {
        $this->container->view->getEnvironment()->addGlobal('oldInput', $_SESSION['oldInput']);
        $_SESSION['oldInput'] = $request->getParams();

        //Call next middleware
        $response = $next($request, $response);
        return $response;
    }
}
