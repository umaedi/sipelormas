<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Services\HibahService;
use App\Services\PermohonanService;
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    protected $permohonan;
    protected $hibah;
    public function __construct(PermohonanService $permohonanService, HibahService $hibahService)
    {
        $this->permohonan = $permohonanService;
        $this->hibah = $hibahService;
    }
    public function index()
    {
        if (\request()->ajax()) {
            $data['table'] = $this->permohonan->get();
            return view('superadmin.permohonan._data_table', $data);
        }

        $data['title'] = 'List Permohonan TTE';
        return view('superadmin.permohonan.index', $data);
    }

    public function show($id)
    {
        $permohonan = $this->permohonan->find($id);
        if (is_null($permohonan)) {
            $data['permohonan'] = $this->hibah->find($id);
        } else {
            $data['permohonan'] = $this->permohonan->find($id);
        }
        $data['title'] = 'Detail permohonan TTE';
        return view('superadmin.permohonan.show', $data);
    }

    public function waiting_sign()
    {
        if (\request()->ajax()) {
            $data['table'] = $this->permohonan->Query()->where('status', 'diproses')->get();
            return view('superadmin.permohonan._data_table_tte', $data);
        }
        $data['title'] = 'List Permohonan Menunggu TTE';
        return view('superadmin.permohonan.waiting_sign', $data);
    }

    public function signed()
    {
        if (\request()->ajax()) {
            $data['table'] = $this->permohonan->Query()->where('status', 'diterima')->get();
            return view('superadmin.permohonan._data_table_tte', $data);
        }
        $data['title'] = 'Permohonan tertanda';
        return view('superadmin.permohonan.signed', $data);
    }

    public function rejected()
    {
        if (\request()->ajax()) {
            $data['table'] = $this->permohonan->Query()->where('status', 'ditolak')->get();
            return view('superadmin.permohonan._data_table_tte', $data);
        }
        $data['title'] = 'List Permohonan TTE Ditolak';
        return view('superadmin.permohonan.rejected', $data);
    }
}
