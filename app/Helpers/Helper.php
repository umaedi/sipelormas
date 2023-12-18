<?php

use App\Models\Log;
use Illuminate\Support\Facades\Auth;

if (!function_exists('create')) {
    function create($result)
    {
        $response = [
            'success' => true,
            'message' => 'Your request has been saved',
        ];
        if (!empty($result)) {
            $response['data'] = $result;
        }

        return response()->json($response, 201);
    }
}

if (!function_exists('error')) {
    function error($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];
        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}

if (!function_exists('saveLogs')) {
    function saveLogs($description, $logtype)
    {
        Log::create([
            'user_id'   => Auth::user()->id,
            'description'   => $description,
            'logtype'   => $logtype
        ]);
    }
}
