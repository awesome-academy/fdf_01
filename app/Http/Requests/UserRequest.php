<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'txtPassword.required' => trans('register.password_required'),
            'txtConfirm.required' => trans('register.confirm_required'),
            'txtConfirm.same' => trans('register.confirm_same'),
            'txtName.required' => trans('register.name_required'),
            'txtName.min' => trans('register.name_min'),
            'txtName.max' => trans('register.name_max'),
            'txtPhone.required' => trans('register.phone_required'),
            'txtPhone.digits_between' => trans('register.phone_digits'),
            'txtAddress.required' => trans('register.address_required'),
            'txtAddress.min' => trans('register.address_min'),
            'txtAddress.max' => trans('register.address_max'),
        ];
    }
}
