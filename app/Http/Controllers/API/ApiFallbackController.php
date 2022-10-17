<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

class ApiFallbackController extends ApiBaseController
{


    public function error(Request $request)
    {
        return $this->sendError(
            'Page Not Found. If error persists, contact ' . env("APP_CONTACT", "info@example.com")
        );
    }
}
