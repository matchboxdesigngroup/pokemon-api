<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Issue a success JSON response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendSuccess($result, $message) {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }

    /**
     * Issue an error JSON response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($message, $additionalErrors, $status = 200) {
        $response = [
            'success' => false,
            'message' => $message,
        ];

        if (!empty($additionalErrors)) {
            $response['errors'] = $additionalErrors;
        }

        return response()->json($response, $status);
    }

}
