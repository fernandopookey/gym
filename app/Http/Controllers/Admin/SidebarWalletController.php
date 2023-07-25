<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member\Member;
use Illuminate\Http\Request;

class SidebarWalletController extends Controller
{
    public function index()
    {
        // $members = Member::all()->count()->latest()->paginate(5);

        $data = [
            // 'totalMember'           => Member::count(),
            'members'               => Member::get()->count()->latest()->paginate(5),
            // 'totalMember'               => Member::count(),
            // 'title'                 => 'Dashboard Admin Gelora GYM',
            // 'content'               => 'admin/layouts/wallet-sidebar'
            'content'               => 'admin/dashboard/index'
        ];
        return view('admin.layouts.wrapper', $data);
    }
}
