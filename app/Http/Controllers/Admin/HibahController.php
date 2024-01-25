<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\HibahService;
use Illuminate\Http\Request;

class HibahController extends Controller
{
    protected $hibah;
    public function __construct(HibahService $hibahService)
    {
        $this->hibah = $hibahService;
    }

    public function index()
    {
        if (\request()->ajax()) {
            $data['table'] = $this->hibah->Query()->where('status', 'dalam antrian')->get();
            return view('admin.hibah._data_antrian', $data);
        }

        $data['title'] = 'Pengajuan dana hibah';
        return view('admin.hibah.index', $data);
    }

    public function show($id)
    {
        $data['title'] = 'Detail Pengajuan dana hibah';
        $data['hibah'] = $this->hibah->find($id);
        return view('admin.hibah.show', $data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        if (isset($data['pesan'])) {
            $data['status'] = 'ditolak';
            $data['keterangan'] = $data['pesan'];
        } else {
            $data['status'] = 'diproses';
            $data['keterangan'] = 'Pengajuan dana hibah';
        }
        try {
            $this->hibah->update($id, $data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
        return redirect('/admin/permohonan/diproses')->with('msg_success', 'Pengajuan berhasil diperbaharui');
    }
}
