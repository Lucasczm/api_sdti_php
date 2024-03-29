<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'http://localhost:8000/api',
        'https://damp-springs-15874.herokuapp.com/api',
        'http://damp-springs-15874.herokuapp.com/api',
        'damp-springs-15874.herokuapp.com/api',
        'https://kiklotapi.herokuapp.com/api',
        'http://kiklotapi.herokuapp.com/api',
        'kiklotapi.herokuapp.com/api'

    ];
}
