<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function success(string|array $data = null, $message = 'success', int $code = Response::HTTP_OK)
    {
        $response = [
            'success'   => true,
            'message'   => $message
        ];

        if (!is_null($data)) {
            $response['data'] = $data;
        }

        return response()->json($response, $code);
    }

    protected function error(string $message, int $code = Response::HTTP_INTERNAL_SERVER_ERROR)
    {
        return response()->json([
            'success'   => false,
            'message'   => $message
        ], $code);
    }
}
