<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRequest;
use App\Models\Admin\SourceCode;
use App\Models\Member;
use App\Models\MemberPackage;
use App\Models\MethodPayment;
use App\Models\Refferal;
use App\Models\Sold;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $data = [
            'title'             => 'Member List',
            'members'           => Member::get(),
            'sourceCode'        => SourceCode::get(),
            'memberPackage'     => MemberPackage::get(),
            'methodPayment'     => MethodPayment::get(),
            'soldBy'            => Sold::get(),
            'refferalName'      => Refferal::get(),
            'content'           => 'admin/member/index'
        ];

        return view('admin.layouts.wrapper', $data);
    }

    public function create()
    {
        //
    }

    public function store(MemberRequest $request)
    {
        $data = $request->all();
        $data['member_code'] = 'GELORA-' . mt_rand(00000, 99999) . '-GYM';

        if ($request->hasFile('photos')) {

            if ($request->photos != null) {
                $realLocation = "storage/" . $request->photos;
                if (file_exists($realLocation) && !is_dir($realLocation)) {
                    unlink($realLocation);
                }
            }

            $photos = $request->file('photos');
            $file_name = time() . '-' . $photos->getClientOriginalName();

            $data['photos'] = $request->file('photos')->store('assets/member', 'public');
        } else {
            $data['photos'] = $request->photos;
        }
        // $data['photos'] = $request->file('photos')->store('assets/member', 'public');

        Member::create($data);
        return redirect()->route('member.index')->with('message', 'Member Added Successfully');
    }

    public function edit(string $id)
    {
        // 
    }

    public function update(Request $request, string $id)
    {
        $item = Member::find($id);
        $data = $request->validate([
            'first_name'            => '',
            'last_name'             => '',
            'gender'                => '',
            'phone_number'          => '',
            'source_code_id'        => '',
            'member_package_id'     => '',
            'method_payment_id'     => '',
            'sold_by_id'            => '',
            'refferal_id'           => '',
            'status'                => '',
            'description'           => '',
            'photos'                => 'nullable|mimes:png,jpg,jpeg'
        ]);

        if ($request->hasFile('photos')) {

            if ($item->photos != null) {
                $realLocation = "storage/" . $item->photos;
                if (file_exists($realLocation) && !is_dir($realLocation)) {
                    unlink($realLocation);
                }
            }

            $photos = $request->file('photos');
            $file_name = time() . '-' . $photos->getClientOriginalName();

            $data['photos'] = $request->file('photos')->store('assets/member', 'public');
        } else {
            $data['photos'] = $item->photos;
        }

        $item->update($data);
        return redirect()->route('member.index')->with('message', 'Member Updated Successfully');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->back()->with('message', 'Member Deleted Successfully');
    }
}
