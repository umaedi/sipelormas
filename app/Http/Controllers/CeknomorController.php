<?php

namespace App\Http\Controllers;

use App\Services\PermohonanService;
use Illuminate\Http\Request;

class CeknomorController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected $permohonan;
    public function __construct(PermohonanService $permohonanService)
    {
        $this->permohonan = $permohonanService;
    }
    public function __invoke(Request $request, $id)
    {
        $skt = $this->permohonan->Query()->where('no_skt', $id)->first();

        if ($skt) {
            $response = [
                'no_skt'    => $skt->no_skt,
                'skt'       => $skt->skt,
                'pesan'     => 'No SKT tersebut benar dan terdaftar pada database kami. Pastikan no SKT di cek pada link berikut https://sipelormas.tulangbawangkab.go.id'
            ];
            return $this->success($response);
        } else {
            return $this->error('Mohon maaf no SKT yang Anda masukan tidak terdaftar pada database kami!');
        }
    }
}
