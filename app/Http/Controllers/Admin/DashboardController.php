<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalMember'           => Member::count(),
            'activeMember'          => Member::where('status', 'Active')->count(),
            'inactiveMember'        => Member::where('status', 'Inactive')->count(),
            'title'                 => 'Dashboard Admin Gelora GYM',
            'content'               => 'admin/dashboard/index'
        ];
        return view('admin.layouts.wrapper', $data);
    }
}
