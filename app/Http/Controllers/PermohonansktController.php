<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\PermohonanService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PermohonansktController extends Controller
{
    protected $permohonan;
    public function __construct(PermohonanService $permohonanService)
    {
        $this->permohonan = $permohonanService;
    }
    public function create()
    {


        $data['title'] = 'Permohonan SKT/ORMAS';
        return view('permohonanskt.create', $data);
        // $image = QrCode::format('png')
        //     ->merge('img/template.png', 0.1, true)
        //     ->size(200)->errorCorrection('H')
        //     ->generate('A simple example of QR code!');
        // $output_file = '/img/qr-code/img-' . time() . '.png';
        // Storage::disk('local')->put($output_file, $image); //storage/app/public/img/qr-code/img-1557309130.png
        // dd('ok');
    }

    public function store(Request $request)
    {
        $data = \request()->except('_token');
        $data['user_id'] = Auth::user()->id;
        $validator = Validator::make(\request()->all(), [
            'lampiran1' => 'required|file|mimes:pdf|max:2048',
            'lampiran2' => 'required|file|mimes:pdf|max:2048',
            'lampiran3' => 'required|file|mimes:pdf|max:2048',
            'lampiran4' => 'required|file|mimes:pdf|max:2048',
            'lampiran5' => 'required|file|mimes:pdf|max:2048',
            'lampiran6' => 'required|file|mimes:pdf|max:2048',
            'lampiran7' => 'required|file|mimes:pdf|max:2048',
            'lampiran8' => 'required|file|mimes:pdf,jpeg,jpg,png|max:2048',
            'lampiran9' => 'required|file|mimes:pdf|max:2048',
            'lampiran10' => 'required|file|mimes:pdf|max:2048',
            'lampiran11' => 'required|file|mimes:pdf|max:2048',
            'lampiran12' => 'required|file|mimes:pdf|max:2048',
            'lampiran13' => 'required|file|mimes:pdf|max:2048',
            'lampiran14' => 'required|file|mimes:pdf|max:2048',
            'lampiran15' => 'required|file|mimes:pdf|max:2048',
            'lampiran16' => 'required|file|mimes:pdf|max:2048',
            'lampiran17' => 'required|file|mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            return $this->error($validator->errors());
        }

        $randomName = Str::random(16);

        $lampiran1 = $request->file('lampiran1');
        $newLampiran1 = Str::replace('', '_',  strtolower(auth()->user()->nama . '_lampiran1_' . $randomName . '.' . $lampiran1->getClientOriginalExtension()));
        $data['lampiran1'] = $lampiran1->storeAs('public/lampiran', $newLampiran1);

        $lampiran2 = $request->file('lampiran2');
        $newLampiran2 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran2_' . $randomName . '.' . $lampiran2->getClientOriginalExtension()));
        $data['lampiran2'] = $lampiran2->storeAs('public/lampiran', $newLampiran2);

        $lampiran3 = $request->file('lampiran3');
        $newLampiran3 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran3_' . $randomName . '.' . $lampiran3->getClientOriginalExtension()));
        $data['lampiran3'] = $lampiran3->storeAs('public/lampiran', $newLampiran3);

        $lampiran4 = $request->file('lampiran4');
        $newLampiran4 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran4_' . $randomName . '.' . $lampiran4->getClientOriginalExtension()));
        $data['lampiran4'] = $lampiran4->storeAs('public/lampiran', $newLampiran4);

        $lampiran5 = $request->file('lampiran5');
        $newLampiran5 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran5_' . $randomName . '.' . $lampiran5->getClientOriginalExtension()));
        $data['lampiran5'] = $lampiran5->storeAs('public/lampiran', $newLampiran5);

        $lampiran6 = $request->file('lampiran6');
        $newLampiran6 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran6_' . $randomName . '.' . $lampiran6->getClientOriginalExtension()));
        $data['lampiran6'] = $lampiran6->storeAs('public/lampiran', $newLampiran6);

        $lampiran7 = $request->file('lampiran7');
        $newLampiran7 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran7_' . $randomName . '.' . $lampiran7->getClientOriginalExtension()));
        $data['lampiran7'] = $lampiran7->storeAs('public/lampiran', $newLampiran7);

        $lampiran8 = $request->file('lampiran8');
        $newLampiran8 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran8_' . $randomName . '.' . $lampiran8->getClientOriginalExtension()));
        $data['lampiran8'] = $lampiran8->storeAs('public/lampiran', $newLampiran8);

        $lampiran9 = $request->file('lampiran9');
        $newLampiran9 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran9_' . $randomName . '.' . $lampiran9->getClientOriginalExtension()));
        $data['lampiran9'] = $lampiran9->storeAs('public/lampiran', $newLampiran9);

        $lampiran10 = $request->file('lampiran10');
        $newLampiran10 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran10_' . $randomName . '.' . $lampiran10->getClientOriginalExtension()));
        $data['lampiran10'] = $lampiran10->storeAs('public/lampiran', $newLampiran10);

        $lampiran11 = $request->file('lampiran11');
        $newLampiran11 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran11_' . $randomName . '.' . $lampiran11->getClientOriginalExtension()));
        $data['lampiran11'] = $lampiran11->storeAs('public/lampiran', $newLampiran11);

        $lampiran12 = $request->file('lampiran12');
        $newLampiran12 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran12_' . $randomName . '.' . $lampiran12->getClientOriginalExtension()));
        $data['lampiran12'] = $lampiran12->storeAs('public/lampiran', $newLampiran12);

        $lampiran13 = $request->file('lampiran13');
        $newLampiran13 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran13_' . $randomName . '.' . $lampiran13->getClientOriginalExtension()));
        $data['lampiran13'] = $lampiran13->storeAs('public/lampiran', $newLampiran13);

        $lampiran14 = $request->file('lampiran14');
        $newLampiran14 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran14_' . $randomName . '.' . $lampiran14->getClientOriginalExtension()));
        $data['lampiran14'] = $lampiran14->storeAs('public/lampiran', $newLampiran14);

        $lampiran15 = $request->file('lampiran15');
        $newLampiran15 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran15_' . $randomName . '.' . $lampiran15->getClientOriginalExtension()));
        $data['lampiran15'] = $lampiran15->storeAs('public/lampiran', $newLampiran15);

        $lampiran16 = $request->file('lampiran16');
        $newLampiran16 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran16_' . $randomName . '.' . $lampiran16->getClientOriginalExtension()));
        $data['lampiran16'] = $lampiran16->storeAs('public/lampiran', $newLampiran16);

        $lampiran17 = $request->file('lampiran17');
        $newLampiran17 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran17_' . $randomName . '.' . $lampiran17->getClientOriginalExtension()));
        $data['lampiran17'] = $lampiran17->storeAs('public/lampiran', $newLampiran17);

        if ($request->file('lampiran18')) {
            $lampiran18 = $request->file('lampiran18');
            $newLampiran18 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran18_' . $randomName . '.' . $lampiran18->getClientOriginalExtension()));
            $data['lampiran18'] = $lampiran18->storeAs('public/lampiran', $newLampiran18);
        }
        if ($request->file('lampiran19')) {
            $lampiran19 = $request->file('lampiran19');
            $newLampiran19 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran19_' . $randomName . '.' . $lampiran19->getClientOriginalExtension()));
            $data['lampiran19'] = $lampiran19->storeAs('public/lampiran', $newLampiran19);
        }
        if ($request->file('lampiran20')) {
            $lampiran20 = $request->file('lampiran20');
            $newLampiran20 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran20_' . $randomName . '.' . $lampiran20->getClientOriginalExtension()));
            $data['lampiran20'] = $lampiran20->storeAs('public/lampiran', $newLampiran20);
        }
        if ($request->file('lampiran21')) {
            $lampiran21 = $request->file('lampiran21');
            $newLampiran21 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran21_' . $randomName . '.' . $lampiran21->getClientOriginalExtension()));
            $data['lampiran21'] = $lampiran21->storeAs('public/lampiran', $newLampiran21);
        }

        try {
            $this->permohonan->store($data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
        return $this->success('Permohonan berhasil terkirim');
    }

    public function show($id)
    {
        $data['permohonan'] = $this->permohonan->find($id);
        $data['title'] = 'Detail Permohonan';
        return view('permohonanskt.show', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Permohonan';
        $data['id'] = $id;
        return view('permohonanskt.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $data['user_id'] = Auth::user()->id;
        $validator = Validator::make(\request()->all(), [
            'lampiran1' => 'file|mimes:pdf|max:2048',
            'lampiran2' => 'file|mimes:pdf|max:2048',
            'lampiran3' => 'file|mimes:pdf|max:2048',
            'lampiran4' => 'file|mimes:pdf|max:2048',
            'lampiran5' => 'file|mimes:pdf|max:2048',
            'lampiran6' => 'file|mimes:pdf|max:2048',
            'lampiran7' => 'file|mimes:pdf|max:2048',
            'lampiran8' => 'file|mimes:pdf|max:2048',
            'lampiran9' => 'file|mimes:pdf|max:2048',
            'lampiran10' => 'file|mimes:pdf|max:2048',
            'lampiran11' => 'file|mimes:pdf|max:2048',
            'lampiran12' => 'file|mimes:pdf|max:2048',
            'lampiran13' => 'file|mimes:pdf|max:2048',
            'lampiran14' => 'file|mimes:pdf|max:2048',
            'lampiran15' => 'file|mimes:pdf|max:2048',
            'lampiran16' => 'file|mimes:pdf|max:2048',
            'lampiran17' => 'file|mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            return $this->error($validator->errors());
        }

        $permohonan = $this->permohonan->find($id);
        $randomName = Str::random(16);

        if ($request->file('lampiran1')) {
            $lampiran1 = $request->file('lampiran1');
            $newLampiran1 = Str::replace('', '_',  strtolower(auth()->user()->nama . '_lampiran1_' . $randomName . '.' . $lampiran1->getClientOriginalExtension()));
            $data['lampiran1'] = $lampiran1->storeAs('public/lampiran', $newLampiran1);
            Storage::delete($permohonan->lampiran1);
        } else {
            $data['lampiran1'] = $permohonan->lampiran1;
        }

        if ($request->file('lampiran2')) {
            $lampiran2 = $request->file('lampiran2');
            $newLampiran2 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran2_' . $randomName . '.' . $lampiran2->getClientOriginalExtension()));
            $data['lampiran2'] = $lampiran2->storeAs('public/lampiran', $newLampiran2);
            Storage::delete($permohonan->lampiran2);
        } else {
            $data['lampiran2'] = $permohonan->lampiran2;
        }

        if ($request->file('lampiran3')) {
            $lampiran3 = $request->file('lampiran3');
            $newLampiran3 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran3_' . $randomName . '.' . $lampiran3->getClientOriginalExtension()));
            $data['lampiran3'] = $lampiran3->storeAs('public/lampiran', $newLampiran3);
            Storage::delete($permohonan->lampiran3);
        } else {
            $data['lampiran3'] = $permohonan->lampiran3;
        }

        if ($request->file('lampiran4')) {
            $lampiran4 = $request->file('lampiran4');
            $newLampiran4 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran4_' . $randomName . '.' . $lampiran4->getClientOriginalExtension()));
            $data['lampiran4'] = $lampiran4->storeAs('public/lampiran', $newLampiran4);
            Storage::delete($permohonan->lampiran4);
        } else {
            $data['lampiran4'] = $permohonan->lampiran4;
        }

        if ($request->file('lampiran5')) {
            $lampiran5 = $request->file('lampiran5');
            $newLampiran5 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran5_' . $randomName . '.' . $lampiran5->getClientOriginalExtension()));
            $data['lampiran5'] = $lampiran5->storeAs('public/lampiran', $newLampiran5);
            Storage::delete($permohonan->lampiran5);
        } else {
            $data['lampiran5'] = $permohonan->lampiran5;
        }

        if ($request->file('lampiran6')) {
            $lampiran6 = $request->file('lampiran6');
            $newLampiran6 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran6_' . $randomName . '.' . $lampiran6->getClientOriginalExtension()));
            $data['lampiran6'] = $lampiran6->storeAs('public/lampiran', $newLampiran6);
            Storage::delete($permohonan->lampiran6);
        } else {
            $data['lampiran6'] = $permohonan->lampiran6;
        }

        if ($request->file('lampiran7')) {
            $lampiran7 = $request->file('lampiran7');
            $newLampiran7 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran7_' . $randomName . '.' . $lampiran7->getClientOriginalExtension()));
            $data['lampiran7'] = $lampiran7->storeAs('public/lampiran', $newLampiran7);
            Storage::delete($permohonan->lampiran7);
        } else {
            $data['lampiran7'] = $permohonan->lampiran7;
        }

        if ($request->file('lampiran8')) {
            $lampiran8 = $request->file('lampiran8');
            $newLampiran8 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran8_' . $randomName . '.' . $lampiran8->getClientOriginalExtension()));
            $data['lampiran8'] = $lampiran8->storeAs('public/lampiran', $newLampiran8);
            Storage::delete($permohonan->lampiran8);
        } else {
            $data['lampiran8'] = $permohonan->lampiran8;
        }

        if ($request->file('lampiran9')) {
            $lampiran9 = $request->file('lampiran9');
            $newLampiran9 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran9_' . $randomName . '.' . $lampiran9->getClientOriginalExtension()));
            $data['lampiran9'] = $lampiran9->storeAs('public/lampiran', $newLampiran9);
            Storage::delete($permohonan->lampiran9);
        } else {
            $data['lampiran9'] = $permohonan->lampiran9;
        }

        if ($request->file('lampiran10')) {
            $lampiran10 = $request->file('lampiran10');
            $newLampiran10 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran10_' . $randomName . '.' . $lampiran10->getClientOriginalExtension()));
            $data['lampiran10'] = $lampiran10->storeAs('public/lampiran', $newLampiran10);
            Storage::delete($permohonan->lampiran10);
        } else {
            $data['lampiran10'] = $permohonan->lampiran10;
        }

        if ($request->file('lampiran11')) {
            $lampiran11 = $request->file('lampiran11');
            $newLampiran11 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran11_' . $randomName . '.' . $lampiran11->getClientOriginalExtension()));
            $data['lampiran11'] = $lampiran11->storeAs('public/lampiran', $newLampiran11);
            Storage::delete($permohonan->lampiran11);
        } else {
            $data['lampiran11'] = $permohonan->lampiran11;
        }

        if ($request->file('lampiran12')) {
            $lampiran12 = $request->file('lampiran12');
            $newLampiran12 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran12_' . $randomName . '.' . $lampiran12->getClientOriginalExtension()));
            $data['lampiran12'] = $lampiran12->storeAs('public/lampiran', $newLampiran12);
            Storage::delete($permohonan->lampiran12);
        } else {
            $data['lampiran12'] = $permohonan->lampiran12;
        }

        if ($request->file('lampiran13')) {
            $lampiran13 = $request->file('lampiran13');
            $newLampiran13 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran13_' . $randomName . '.' . $lampiran13->getClientOriginalExtension()));
            $data['lampiran13'] = $lampiran13->storeAs('public/lampiran', $newLampiran13);
            Storage::delete($permohonan->lampiran13);
        } else {
            $data['lampiran13'] = $permohonan->lampiran13;
        }

        if ($request->file('lampiran14')) {
            $lampiran14 = $request->file('lampiran14');
            $newLampiran14 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran14_' . $randomName . '.' . $lampiran14->getClientOriginalExtension()));
            $data['lampiran14'] = $lampiran14->storeAs('public/lampiran', $newLampiran14);
            Storage::delete($permohonan->lampiran14);
        } else {
            $data['lampiran14'] = $permohonan->lampiran14;
        }

        if ($request->file('lampiran15')) {
            $lampiran15 = $request->file('lampiran15');
            $newLampiran15 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran15_' . $randomName . '.' . $lampiran15->getClientOriginalExtension()));
            $data['lampiran15'] = $lampiran15->storeAs('public/lampiran', $newLampiran15);
            Storage::delete($permohonan->lampiran15);
        } else {
            $data['lampiran15'] = $permohonan->lampiran15;
        }

        if ($request->file('lampiran16')) {
            $lampiran16 = $request->file('lampiran16');
            $newLampiran16 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran16_' . $randomName . '.' . $lampiran16->getClientOriginalExtension()));
            $data['lampiran16'] = $lampiran16->storeAs('public/lampiran', $newLampiran16);
            Storage::delete($permohonan->lampiran16);
        } else {
            $data['lampiran16'] = $permohonan->lampiran16;
        }

        if ($request->file('lampiran17')) {
            $lampiran17 = $request->file('lampiran17');
            $newLampiran17 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran17_' . $randomName . '.' . $lampiran17->getClientOriginalExtension()));
            $data['lampiran17'] = $lampiran17->storeAs('public/lampiran', $newLampiran17);
            Storage::delete($permohonan->lampiran17);
        } else {
            $data['lampiran17'] = $permohonan->lampiran17;
        }

        if ($request->file('lampiran18')) {
            $lampiran18 = $request->file('lampiran18');
            $newLampiran18 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran18_' . $randomName . '.' . $lampiran18->getClientOriginalExtension()));
            $data['lampiran18'] = $lampiran18->storeAs('public/lampiran', $newLampiran18);
            Storage::delete($permohonan->lampiran18);
        } else {
            $data['lampiran18'] = $permohonan->lampiran18;
        }

        if ($request->file('lampiran19')) {
            $lampiran19 = $request->file('lampiran19');
            $newLampiran19 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran19_' . $randomName . '.' . $lampiran19->getClientOriginalExtension()));
            $data['lampiran19'] = $lampiran19->storeAs('public/lampiran', $newLampiran19);
            Storage::delete($permohonan->lampiran19);
        } else {
            $data['lampiran19'] = $permohonan->lampiran19;
        }

        if ($request->file('lampiran20')) {
            $lampiran20 = $request->file('lampiran20');
            $newLampiran20 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran20_' . $randomName . '.' . $lampiran20->getClientOriginalExtension()));
            $data['lampiran20'] = $lampiran20->storeAs('public/lampiran', $newLampiran20);
            Storage::delete($permohonan->lampiran20);
        } else {
            $data['lampiran20'] = $permohonan->lampiran20;
        }

        if ($request->file('lampiran21')) {
            $lampiran21 = $request->file('lampiran21');
            $newLampiran21 = Str::replace('', '_', strtolower(auth()->user()->nama . '_lampiran21_' . $randomName . '.' . $lampiran21->getClientOriginalExtension()));
            $data['lampiran21'] = $lampiran21->storeAs('public/lampiran', $newLampiran21);
            Storage::delete($permohonan->lampiran21);
        } else {
            $data['lampiran21'] = $permohonan->lampiran21;
        }

        $data['status'] = 'dalam antrian';
        try {
            $this->permohonan->update($id, $data);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
        return $this->success('Permohonan berhasil diperbaharui');
    }

    public function destroy($id)
    {
        try {
            $this->permohonan->softDelete($id);
        } catch (\Throwable $th) {
            saveLogs($th->getMessage(), 'error');
            throw $th;
        }
        return redirect('/user/dashboard');
    }
}
