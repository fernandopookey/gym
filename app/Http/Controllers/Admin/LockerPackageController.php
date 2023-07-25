<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LockerPackageStoreRequest;
use App\Http\Requests\LockerPackageUpdateRequest;
use App\Models\LockerPackage;
use Illuminate\Http\Request;

class LockerPackageController extends Controller
{
    public function index()
    {
        $data = [
            'title'                     => 'Locker Package List',
            'lockerPackage'             => LockerPackage::get(),
            'content'                   => 'admin/locker-package/index'
        ];

        return view('admin.layouts.wrapper', $data);
    }

    public function create()
    {
        //
    }

    public function store(LockerPackageStoreRequest $request)
    {
        $data = $request->all();

        LockerPackage::create($data);
        return redirect()->route('locker-package.index')->with('message', 'Locker Package Added Successfully');
    }

    public function edit(string $id)
    {
        //
    }

    public function update(LockerPackageUpdateRequest $request, string $id)
    {
        $item = LockerPackage::find($id);
        $data = $request->all();

        $item->update($data);
        return redirect()->route('locker-package.index')->with('message', 'Locker Package Updated Successfully');
    }

    public function destroy(LockerPackage $lockerPackage)
    {
        $lockerPackage->delete();
        return redirect()->back()->with('message', 'Locker Package Deleted Successfully');
    }
}
