<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LockerPackageUpdateRequest extends FormRequest
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
            'package_name'      => 'required|string',
            'number_of_days'    => 'required|numeric',
            'package_price'     => 'required|numeric',
            'description'       => 'nullable'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'package_price' => str_replace(',', '', $this->package_price)
        ]);
    }
}
