<?php

namespace SalKhimani\LaravelPassportMongoDB\Http\Controllers;

use SalKhimani\LaravelPassportMongoDB\Passport;

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
