<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Services\PermohonanService;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TTEController extends Controller
{
    protected $permohonan;
    public function __construct(PermohonanService $permohonanService)
    {
        $this->permohonan = $permohonanService;
    }
    public function sign(Request $request, $id)
    {
        if (Hash::check($request->password, Auth::user()->password)) {
            $data['status'] = 'diterima';
            $data['terdaftar_at'] = Carbon::now()->toDateTimeString();
            try {
                $this->permohonan->update($id, $data);
            } catch (\Throwable $th) {
                return $this->error($th->getMessage());
            }
        } else {
            return $this->error('Password salah!');
        }
        return $this->success('Dokumen berhasil di TTE');
    }

    public function reject(Request $request, $id)
    {
        $data['status'] = 'ditolak';
        try {
            $this->permohonan->update($id, $data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
        return $this->success('Dokumen berhasil di tolak!');
    }
}
