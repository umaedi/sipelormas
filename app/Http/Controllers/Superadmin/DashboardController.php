<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Services\HibahService;
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
    public $permohonan;
    public $hibah;
    public function __construct(HibahService $hibahService, PermohonanService $permohonanService)
    {
        $this->permohonan = $permohonanService;
        $this->hibah = $hibahService;
    }

    public function __invoke(Request $request)
    {
        if (\request()->ajax()) {
            $data['table'] = $this->permohonan->Query()->with('hibah')->where('status', 'diproses')->get();
            return view('superadmin.dashboard._data_table', $data);
        }

        $data['permohonan'] = $this->permohonan->count();
        $data['waiting_sign'] = $this->permohonan->Query()->where('status', 'diproses')->count();
        $data['signed'] = $this->permohonan->Query()->where('status', 'diterima')->count();
        $data['sign_rejected'] = $this->permohonan->Query()->where('status', 'ditolak')->count();
        return view('superadmin.dashboard.index', $data);
    }
}
