<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SessionMiddleware
{
    protected $session;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    public function handle($request, Closure $next)
    {
        if ($this->session->has('user')) {
            $user = $this->session->get('user');

            return $next($request);
        } else {
            return redirect('login');
        }
    }
}