<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\PermohonanService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MutasiController extends Controller
{
    public $permohonan;
    public function __construct(PermohonanService $permohonanService)
    {
        $this->permohonan = $permohonanService;
    }

    public function index()
    {
        if (request()->ajax()) {
            $data['table'] = $this->permohonan->Query()->where('user_id', auth()->user()->id)->where('kategori', 'Permohonan alih tugas')->get();
            return view('mutasi._data_table', $data);
        }
        return view('mutasi.index');
    }

    public function create()
    {
        $data['title'] = 'Formulir Permohonan Alih Tugas atau Mutasi';
        return view('mutasi.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'lampiran1' => 'required|file|mimes:pdf,docx|max:2048',
            'lampiran2' => 'required|file|mimes:pdf,docx|max:2048',
            'lampiran3' => 'required|file|mimes:pdf,docx|max:2048',
            'lampiran4' => 'required|file|mimes:pdf,docx|max:2048',
            'lampiran5' => 'required|file|mimes:pdf,docx|max:2048',
        ]);

        $data['user_id'] = Auth::user()->id;
        $data['kategori'] = 'Permohonan alih tugas';
        $randomName = Str::random(16);

        $lampiran1 = $request->file('lampiran1');
        $newLampiran1 = Str::replace('', '_',  strtolower(auth()->user()->nama . '_sk_mutasi_surat_persetujuan_dari_bupati_' . $randomName . '.' . $lampiran1->getClientOriginalExtension()));
        $data['lampiran1'] = $lampiran1->storeAs('public/lampiran', $newLampiran1);

        $lampiran2 = $request->file('lampiran2');
        $newLampiran2 = Str::replace('', '_', strtolower(auth()->user()->nama . '_pengantar_dari_kepala_opd_' . $randomName . '.' . $lampiran2->getClientOriginalExtension()));
        $data['lampiran2'] = $lampiran2->storeAs('public/lampiran', $newLampiran2);

        $lampiran3 = $request->file('lampiran3');
        $newLampiran3 = Str::replace('', '_', strtolower(auth()->user()->nama . '_sk_pangkat_jabatan_terakhir_' . $randomName . '.' . $lampiran3->getClientOriginalExtension()));
        $data['lampiran3'] = $lampiran3->storeAs('public/lampiran', $newLampiran3);

        $lampiran4 = $request->file('lampiran4');
        $newLampiran4 = Str::replace('', '_', strtolower(auth()->user()->nama . '_skp_1_tahun_terakhir_' . $randomName . '.' . $lampiran4->getClientOriginalExtension()));
        $data['lampiran4'] = $lampiran4->storeAs('public/lampiran', $newLampiran4);

        $lampiran5 = $request->file('lampiran5');
        $newLampiran5 = Str::replace('', '_', strtolower(auth()->user()->nama . '_daftar_hadir_3_bulan_terakhir_' . $randomName . '.' . $lampiran5->getClientOriginalExtension()));
        $data['lampiran5'] = $lampiran5->storeAs('public/lampiran', $newLampiran5);

        DB::beginTransaction();
        try {
            $this->permohonan->store($data);
        } catch (\Throwable $th) {
            saveLogs($th->getMessage(), 'error!');
            DB::rollBack();
            throw $th;
        }
        DB::commit();
        return redirect('/user/mutasi')->with('msg_mutasi', 'Permohonan Alih Tugas atau Mutasi berhasil terkirim');
    }

    public function show($id)
    {
        $data['title'] = 'Permohonan Alih Tugas atau Mutasi';
        $data['mutasi'] = $this->permohonan->find($id);
        return view('mutasi.show', $data);
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $this->permohonan->softDelete($id);
        } catch (\Throwable $th) {
            saveLogs($th->getMessage(), 'error!');
            DB::rollBack();
            throw $th;
        }
        DB::commit();
        return redirect('/user/mutasi')->with('msg_mutasi', 'Permohonan Alih Tugas atau Mutasi berhasil dihpaus!');
    }
}
