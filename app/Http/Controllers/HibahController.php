<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\HibahService;
use App\Services\PermohonanService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HibahController extends Controller
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
            $data['table'] = $this->hibah->Query()->where('user_id', Auth::user()->id)->get();
            return view('hibah._data_hibah', $data);
        }

        $cek_tgl_terdaftar = $this->permohonan->Query()->where('user_id', Auth::user()->id)->first();
        if (is_null($cek_tgl_terdaftar)) {
            return back()->with('msg_ditolak', 'Silakan melakukan permohonan SKT terlebih dahulu');
        } elseif ($cek_tgl_terdaftar->status == 'dalam antrian') {
            return back()->with('msg_ditolak', 'Mohon maaf Anda belum bisa mengajukan dana hibah, dikarenakan permohonan SKT Anda masih ' . $cek_tgl_terdaftar->status);
        } elseif ($cek_tgl_terdaftar->status == 'diproses') {
            return back()->with('msg_ditolak', 'Mohon maaf Anda belum bisa mengajukan dana hibah, dikarenakan permohonan SKT Anda sedang ' . $cek_tgl_terdaftar->status);
        } elseif ($cek_tgl_terdaftar->status == 'diitolak') {
            return back()->with('msg_ditolak', 'Mohon maaf Anda belum bisa mengajukan dana hibah, dikarenakan permohonan SKT Anda ' . $cek_tgl_terdaftar->status);
        }

        $tanggal_terdaftar = Carbon::parse($cek_tgl_terdaftar->tgl_terdaftar);

        $target = $tanggal_terdaftar->addYear(3);
        $waktu_sekarang = Carbon::now()->toDateTimeString();

        $data['title'] = 'Dana Hibah';
        if (Carbon::parse($target) < Carbon::parse($waktu_sekarang)) {
            return view('hibah.index', $data);
        } else {
            $data['tgl_terdaftar'] = $target;
            return view('hibah._countdown', $data);
        }
    }

    public function create()
    {
        $data['title'] = 'Buat Pengajuan';
        return view('hibah.create', $data);
    }

    public function store()
    {
        $validator = Validator::make(\request()->all(), [
            'jumlah_hibah'  => 'required|string|max:20',
            'lampiran_1' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'lampiran_2' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'lampiran_3' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return $this->error($validator->errors());
        }

        $data = \request()->except('_token');
        $data['user_id'] = Auth::user()->id;

        try {
            $this->hibah->store($data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }

        return $this->success('OK', 'Pengajuan Berhasil Terkirim');
    }
}
