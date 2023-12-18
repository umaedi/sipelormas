<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;
    public function __construct(UserService $userService)
    {
        $this->user = $userService;
    }

    public function show($id)
    {
        $data['title'] = 'Detail data diri pemohon';
        $data['user'] = $this->user->find($id);
        return view('superadmin.users.show', $data);
    }
}
