<?php

namespace LucasCardial\LaravelPassportMongoDB\Http\Controllers;

use LucasCardial\LaravelPassportMongoDB\Passport;

class ScopeController
{
    /**
     * Get all of the available scopes for the application.
     *
     * @return Response
     */
    public function all()
    {
        return Passport::scopes();
    }
}
