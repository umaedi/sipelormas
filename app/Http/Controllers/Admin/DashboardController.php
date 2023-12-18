<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\PermohonanService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private $permohonan;
    public function __construct(PermohonanService $permohonanService)
    {
        $this->permohonan = $permohonanService;
    }

    public function __invoke(Request $request)
    {
        if (request()->ajax()) {
            dd('ok');
        }

        $data['permohonan'] = $this->permohonan->Query()->where('status', 'dalam antrian')->count();
        $data['permohonan_diproses'] = $this->permohonan->Query()->where('status', 'diproses')->count();
        $data['permohonan_diterima'] = $this->permohonan->Query()->where('status', 'diterima')->count();
        $data['permohonan_ditolak'] = $this->permohonan->Query()->where('status', 'ditolak')->count();
        return view('admin.dashboard.index', $data);
    }
}
