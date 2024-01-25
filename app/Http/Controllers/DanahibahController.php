<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Services\HibahService;
use App\Services\PermohonanService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DanahibahController extends Controller
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
        $cek_tgl_terdaftar = $this->permohonan->Query()->where('user_id', Auth::user()->id)->first();
        if (is_null($cek_tgl_terdaftar)) {
            return back()->with('msg_ditolak', 'Silakan melakukan permohonan SKT terlebih dahulu');
        } elseif ($cek_tgl_terdaftar->status == 'dalam antrian') {
            return back()->with('msg_ditolak', 'Mohon maaf Anda belum bisa mengajukan dana hibah, dikarenakan permohonan SKT Anda masih ' . $cek_tgl_terdaftar->status);
        } elseif ($cek_tgl_terdaftar->status == 'diproses') {
            return back()->with('msg_ditolak', 'Mohon maaf Anda belum bisa mengajukan dana hibah, dikarenakan permohonan SKT Anda sedang ' . $cek_tgl_terdaftar->status);
        } elseif ($cek_tgl_terdaftar->status == 'ditolak') {
            return back()->with('msg_ditolak', 'Mohon maaf Anda belum bisa mengajukan dana hibah, dikarenakan permohonan SKT Anda ' . $cek_tgl_terdaftar->status);
        }

        if (\request()->ajax()) {
            $data['table'] = $this->hibah->Query()->where('user_id', Auth::user()->id)->get();
            return view('hibah._data_hibah', $data);
        }

        $tanggal_terdaftar = Carbon::parse($cek_tgl_terdaftar->terdaftar_at);

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
        $cekStatusHibah = $this->hibah->Query()->where('user_id', Auth::user()->id)->latest()->first();
        if ($cekStatusHibah) {
            if ($cekStatusHibah->status == 'dalam antrian') {
                return back()->with('msg_ditolak', 'Mohon maaf, masih ada permohonan yang masih ' . $cekStatusHibah->status);
            } elseif ($cekStatusHibah->status == 'diproses') {
                return back()->with('msg_ditolak', 'Mohon maaf Anda belum bisa mengajukan dana hibah, dikarenakan ada pengajuan sedang ' . $cekStatusHibah->status);
            }

            if ($cekStatusHibah->status == 'diterima') {
                $dateNow = Carbon::now();
                $cekTglAcc = Carbon::parse($cekStatusHibah->tgl_acc);
                $waktuSekarang = Carbon::parse($dateNow);

                $selisihTahun = $cekTglAcc->diffInYears($waktuSekarang);
                if ($selisihTahun < 2) {
                    return back()->with('msg_ditolak', 'Saat ini Anda belum bisa mengajukan dana hibah dikarenakan selisih antara kedua tanggal belum 2 tahun atau lebih. Pengajuan Anda diterima pada tanggal ' . $cekTglAcc);
                }
            }
        }

        $data['title'] = 'Buat Pengajuan';
        return view('hibah.create', $data);
    }

    public function store()
    {
        $validator = Validator::make(\request()->all(), [
            'rencana_anggaran'  => 'required|string|max:20',
            'surat_permohonan_hibah' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'fc_norek' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return $this->error($validator->errors());
        }

        //cek no skt
        $no_skt_in_database = $this->permohonan->Query()->where('no_skt', \request()->no_skt)->count();
        if ($no_skt_in_database !== 1) {
            return $this->error('Mohon maaf no SKT yang Anda masukan tidak ditemukan di database kami');
        }

        $permohonan = $this->permohonan->Query()->where('user_id', Auth::user()->id)->latest()->first();
        $data = \request()->except('_token');
        $data['user_id'] = Auth::user()->id;
        $data['permohonan_id'] = $permohonan->id;

        $randomName = Str::random(16);
        $surat_permohonan_hibah = \request()->file('surat_permohonan_hibah');
        $newsurat_permohonan_hibah = Str::replace(' ', '_',  strtolower(Auth::user()->nama) . '_surat_permohonan_hibah_' . $randomName . '.' . $surat_permohonan_hibah->getClientOriginalExtension());
        $data['surat_permohonan_hibah'] = $surat_permohonan_hibah->storeAs('public/lampiran', $newsurat_permohonan_hibah);

        $fc_norek = \request()->file('fc_norek');
        $newfc_norek = Str::replace(' ', '_',  strtolower(Auth::user()->nama) . '_fc_norek_' . $randomName . '.' . $fc_norek->getClientOriginalExtension());
        $data['fc_norek'] = $fc_norek->storeAs('public/lampiran', $newfc_norek);

        try {
            $this->hibah->store($data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }

        return $this->success('OK', 'Pengajuan Berhasil Terkirim');
    }

    public function show($id)
    {
        $data['hibah'] = $this->hibah->find($id);
        return view('hibah.show', $data);
    }

    public function edit($id)
    {
        $data['hibah'] = $this->hibah->find($id);
        return view('hibah.edit', $data);
    }

    public function update($id)
    {
        $validator = Validator::make(\request()->all(), [
            'rencana_anggaran'  => 'required|string|max:20',
            'surat_permohonan_hibah' => 'file|mimes:pdf,jpg,jpeg,png|max:2048',
            'fc_norek' => 'file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return $this->error($validator->errors());
        }

        $hibah = $this->hibah->find($id);
        $data = \request()->except('_token');

        if (isset($data['surat_permohonan_hibah'])) {
            $randomName = Str::random(16);
            $surat_permohonan_hibah = \request()->file('surat_permohonan_hibah');
            $newsurat_permohonan_hibah = Str::replace(' ', '_',  strtolower(Auth::user()->nama) . '_surat_permohonan_hibah_' . $randomName . '.' . $surat_permohonan_hibah->getClientOriginalExtension());
            $data['surat_permohonan_hibah'] = $surat_permohonan_hibah->storeAs('public/lampiran', $newsurat_permohonan_hibah);
            Storage::delete($hibah->surat_permohonan_hibah);
        } else {
            $data['surat_permohonan_hibah'] = $hibah->surat_permohonan_hibah;
        }

        if (isset($data['fc_norek'])) {
            $randomName = Str::random(16);
            $fc_norek = \request()->file('fc_norek');
            $newfc_norek = Str::replace(' ', '_',  strtolower(Auth::user()->nama) . '_fc_norek_' . $randomName . '.' . $fc_norek->getClientOriginalExtension());
            $data['fc_norek'] = $fc_norek->storeAs('public/lampiran', $newfc_norek);
            Storage::delete($hibah->fc_norek);
        } else {
            $data['fc_norek'] = $hibah->fc_norek;
        }

        $data['status'] = 'dalam antrian';
        $data['rencana_anggaran'] = str_replace('.', '', \request()->rencana_anggaran);
        try {
            $this->hibah->update($id, $data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }

        return back()->with('msg_success', 'Pengajuan dana hibah berhasil di perbaharui');
    }

    public function destroy($id)
    {
        try {
            $this->hibah->softDelete($id);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
        return redirect('/user/hibah')->with('msg_success', 'Pengajuan dana hibah berhasil dihapus!');
    }
}
