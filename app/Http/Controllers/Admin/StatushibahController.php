<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\HibahService;
use Illuminate\Http\Request;

class StatushibahController extends Controller
{
    protected $hibah;
    public function __construct(HibahService $hibahService)
    {
        $this->hibah = $hibahService;
    }
    public function diproses(Request $request)
    {
        if ($request->ajax()) {
            $data['table'] = $this->hibah->Query()->where('status', 'diproses')->paginate();
            return view('admin.hibah._data_hibah_diproses', $data);
        }

        $data['title'] = 'Dana Hibah';
        return view('admin.hibah.diproses', $data);
    }
}
