<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use App\Services\PermohonanService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $user;
    protected $permohonan;
    public function __construct(UserService $userService, PermohonanService $permohonanService)
    {
        $this->user = $userService;
        $this->permohonan = $permohonanService;
    }
    public function index(Request $request)
    {
        if (\request()->ajax()) {
            $data['table'] = $this->user->Query()->where('role', 'user')->limit(5)->get();
            return view('admin.user._data_user', $data);
        }

        $data['title'] = 'Data pemohon';
        return view('admin.user.index', $data);
    }

    public function show($id)
    {
        if (\request()->ajax()) {
            $data['table'] = $this->permohonan->Query()->where('user_id', $id)->get();
            return view('admin.permohonanskt._data_permohonan', $data);
        }
        $data['title'] = 'Data diri pemohon';
        $data['user'] = $this->user->find($id);
        return view('admin.user.show', $data);
    }
}
