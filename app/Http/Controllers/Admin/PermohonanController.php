<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PermohonanService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PermohonanController extends Controller
{
    protected $permohonan;
    public function __construct(PermohonanService $permohonanService)
    {
        $this->permohonan = $permohonanService;
    }

    public function index()
    {
        if (request()->ajax()) {
            $data['table'] = $this->permohonan->Query()->where('status', 'dalam antrian')->get();
            return view('admin.permohonanskt._data_permohonan', $data);
        }
        $data['title'] = 'List permohonan';
        return view('admin.permohonanskt.index', $data);
    }

    public function diproses()
    {
        if (request()->ajax()) {
            $data['table'] = $this->permohonan->Query()->where('status', 'diproses')->get();
            return view('admin.permohonanskt._data_permohonan', $data);
        }
        $data['title'] = 'List permohonan';
        return view('admin.permohonanskt.index', $data);
    }

    public function diterima()
    {
        if (request()->ajax()) {
            $data['table'] = $this->permohonan->Query()->where('status', 'diterima')->get();
            return view('admin.permohonanskt._data_permohonan', $data);
        }
        $data['title'] = 'List permohonan';
        return view('admin.permohonanskt.index', $data);
    }

    public function ditolak()
    {
        if (request()->ajax()) {
            $data['table'] = $this->permohonan->Query()->where('status', 'ditolak')->get();
            return view('admin.permohonanskt._data_permohonan', $data);
        }
        $data['title'] = 'List permohonan';
        return view('admin.permohonanskt.index', $data);
    }

    public function show($id)
    {
        $data['title'] = "Detail Permohonan";
        $data['permohonan'] = $this->permohonan->find($id);
        return view('admin.permohonanskt.show', $data);
    }

    public function update(Request $request, $id)
    {
        if ($request->no_skt) {
            $request->validate([
                'no_skt'    => 'string|max:100',
                'skt'       => 'required|file|mimes:pdf,jpeg,jpg,png,docx|max:2048'
            ]);
            $data['no_skt'] = $request->no_skt;
            $data['skt'] = Storage::putFile('public/dokumen', $request->skt);
        } elseif ($request->status == 'diproses') {
            $data['status'] = 'diproses';
            $data['keterangan'] = 'Permohonan Surat Keterangan Terdaftar (SKT)';
        } else {
            $data['status'] = 'ditolak';
            $data['pesan'] = $request->pesan;
        }

        try {
            $this->permohonan->update($id, $data);
        } catch (\Throwable $th) {
            return throw $th;
        }
        return back()->with('msg_success', 'Status permohonan berhasil diperbaharui');
    }
}
