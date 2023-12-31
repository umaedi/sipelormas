<?php

namespace App\Http\Controllers;

use App\Services\PermohonanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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
    public function __invoke(Request $request)
    {
        if (request()->ajax()) {
            $data['table'] = $this->permohonan->Query()->where('user_id', Auth::user()->id)->get();
            return view('dashboard._data_table', $data);
        }

        $data['title'] = 'Dashboard Sipelormas';
        $data['nama'] = explode(' ', auth()->user()->nama);
        $data['permohonan_skt'] = $this->permohonan->Query()->where('user_id', Auth::user()->id)->count();
        return view('dashboard.index', $data);
    }
}
