<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title'                 => 'Dashboard Admin Gelora GYM',
            'content'               => 'admin/dashboard/index'
        ];
        return view('admin.layouts.wrapper', $data);
    }
}
