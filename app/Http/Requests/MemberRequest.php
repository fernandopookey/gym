<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'first_name'            => 'required',
            'last_name'             => 'required',
            'gender'                => 'required',
            'phone_number'          => 'required',
            'source_code_id'        => 'required',
            'member_package_id'     => 'required',
            'method_payment_id'     => 'required',
            'sold_by_id'            => 'required',
            'refferal_id'           => 'required',
            'status'                => 'required',
            'description'           => '',
            'photos'                => 'mimes:png,jpg,jpeg'
        ];
    }
}
