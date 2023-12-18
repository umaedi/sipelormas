<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function index()
    {

        $apiUrl = "http://10.23.4.3/api/sign/pdf";
        $file = public_path('pdf/test2.pdf');
        try {
            $response = Http::withBasicAuth(env('USER'), env('PASSWORD'))
                ->attach('file', file_get_contents($file), 'test2.pdf')
                ->post($apiUrl, [
                    'nik'   => '1805020112800005',
                    'passphrase'    => '#TT3@Tuba',
                    'tampilan'  => 'invisible'
                ]);

            if ($response->successful()) {
                return response()->json($response->json());
            } else {
                return response()->json(['error' => 'Invalid API response'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
