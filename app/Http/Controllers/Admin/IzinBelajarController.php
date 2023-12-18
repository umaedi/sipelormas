<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\PermohonanService;
use Illuminate\Support\Facades\Storage;

class IzinBelajarController extends Controller
{
    private $permohonan;
    public function __construct(PermohonanService $permohonanService)
    {
        $this->permohonan = $permohonanService;
    }

    public function index()
    {
        if (request()->ajax()) {
            $permohonan = $this->permohonan->Query();
            $page = request()->get('pagination', 10);

            if (request()->q) {
                $permohonan->whereHas('user', function ($query) {
                    $query->where('nama', 'like', '%' . request()->q . '%');
                });
            }

            $data['table'] = $permohonan->with('user')->where('kategori', 'Permohonan izin belajar')->where('status', request()->index)->paginate($page);
            return view('admin.izinbelajar._data_table', $data);
        }

        $data['title'] = 'Permohonan Izin Belajar';
        return view('admin.izinbelajar.index', $data);
    }

    public function show($id)
    {
        $data['izinbelajar'] = $this->permohonan->find($id);
        $data['title'] = 'Permohonan Izin Belajar';
        return view('admin.izinbelajar.show', $data);
    }

    public function update(Request $request, $id)
    {

        if ($request->status == 'diproses') {
            $status = 'diproses';
            $redirect = '/admin/permohonan_izin_belajar?index=diproses';
        } elseif ($request->status == 'diterima') {
            $status = 'diterima';
            $suratizin = $request->file('suratizin')->store('public/surat_izin');
            $redirect = '/admin/permohonan_izin_belajar?index=diterima';
        } else {
            $status = 'ditolak';
            $redirect = '/admin/permohonan_izin_belajar?index=ditolak';
            $pesan = $request->pesan;
        }

        DB::beginTransaction();
        try {
            $this->permohonan->update($id, $status, $pesan ?? '', $suratizin ?? '');
        } catch (\Throwable $th) {
            DB::rollBack();
            return throw $th;
        }
        DB::commit();
        return redirect($redirect)->with('msg_success', 'Status Permohonan Izin Belajar Berhasil Diperbaharui');
    }
}
