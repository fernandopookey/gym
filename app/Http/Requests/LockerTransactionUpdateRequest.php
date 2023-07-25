<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LockerTransactionUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'member_id'         => 'required|exists:members,id',
            'active_period'     => 'required|string',
            // 'member_code'       => 'required|exists:members,id',
            'locker_package'    => 'required|exists:locker_packages,id',
            // 'package_price'     => 'required|exists:locker_packages,id',
            'description'       => '',
            'status'            => 'required',
            'cs_name'           => 'required|exists:customer_services,id'
        ];
    }
}
