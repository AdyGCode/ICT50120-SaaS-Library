<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class ApiBaseController extends Controller
{

    function __construct()
    {
        // TODO: Need to create a suitable "not authorised" JSON response.
        $this->middleware(
            'role:guest|member|staff|admin',
            ['only' => ['index', 'show',]]
        );
        $this->middleware(
            'role:staff|admin',
            ['only' => ['create', 'store',]]
        );
        $this->middleware(
            'role:staff|admin',
            ['only' => ['edit', 'update',]]
        );
        $this->middleware(
            'role:staff|admin',
            ['only' => ['destroy', 'delete',]]
        );
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
