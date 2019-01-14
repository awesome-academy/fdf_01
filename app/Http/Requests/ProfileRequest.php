<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'txtName' => 'required|min:3|max:30',
            'txtPhone' => 'required|digits_between:9,15',
            'txtAddress' => 'required|min:3|max:50',
        ];
    }

    public function messages()
    {
        return [
            'txtName.required' => trans('admin_profile.name_required'),
            'txtName.min' => trans('admin_profile.name_min'),
            'txtName.max' => trans('admin_profile.name_max'),
            'txtPhone.required' => trans('admin_profile.phone_required'),
            'txtPhone.digits_between' => trans('admin_profile.phone_digits'),
            'txtAddress.required' => trans('admin_profile.address_required'),
            'txtAddress.min' => trans('admin_profile.address_min'),
            'txtAddress.max' => trans('admin_profile.address_max'),
        ];
    }
}
