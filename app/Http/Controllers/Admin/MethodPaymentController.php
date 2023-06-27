<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MethodPayment;
use Illuminate\Http\Request;

class MethodPaymentController extends Controller
{
    public function index()
    {
        $data = [
            'title'                     => 'Method Payment List',
            'methodPayment'             => MethodPayment::get(),
            'content'                   => 'admin/method-payment/index'
        ];

        return view('admin.layouts.wrapper', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'  => 'required|string|max:200'
        ]);

        MethodPayment::create($data);
        return redirect()->route('method-payment.index')->with('message', 'Method Payment Added Successfully');
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $item = MethodPayment::find($id);
        $data = $request->validate([
            'name'              => 'required|string|max:200'
        ]);

        $item->update($data);
        return redirect()->route('method-payment.index')->with('message', 'Method Payment Updated Successfully');
    }

    public function destroy(MethodPayment $methodPayment)
    {
        $methodPayment->delete();
        return redirect()->back()->with('message', 'Method Payment Deleted Successfully');
    }
}
