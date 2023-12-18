<?php

namespace App\Http\Controllers;

use App\Services\PermohonanService;
use Illuminate\Http\Request;

class DownloadController extends Controller
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
    public function __invoke($id)
    {
        $permohonan = $this->permohonan->find($id);
        if ($permohonan->status == 'diterima') {
            return response()->download(storage_path('app/public/dokumen/' . $id . '.pdf'));
        } else {
            return back();
        }
    }
}
