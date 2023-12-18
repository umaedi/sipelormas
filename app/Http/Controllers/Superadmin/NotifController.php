<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Services\PermohonanService;
use Illuminate\Http\Request;

class NotifController extends Controller
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
        if (\request()->ajax()) {
            $notif = $this->permohonan->Query()->where('status', 'diproses')->count();
            return $this->success($notif);
        }
    }
}
