<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function setting(String $id)
    {
        $data = [
            'user' => User::findOrFail($id),
            'url' => route('admin.setting', $id),

        ];

        return view('admin.setting', $data);
    }
}
