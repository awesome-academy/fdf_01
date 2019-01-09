<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManagingUserRequest extends FormRequest
{
    /**
     * Determine if the user is managing_userorized to make this request.
     *
     * @return bool
     */
    public function managing_userorize()
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
            'email' => 'required|email|unique:users',
            'txtPassword' => 'required',
            'txtName' => 'required|min:3|max:30',
            'txtPhone' => 'required|digits_between:9,15',
            'txtAddress' => 'required|min:3|max:50',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => trans('managing_user.email_required'),
            'email.email' => trans('managing_user.email_email'),
            'email.unique' => trans('managing_user.email_unique'),
            'txtPassword.required' => trans('managing_user.password_required'),
            'txtName.required' => trans('managing_user.name_required'),
            'txtName.min' => trans('managing_user.name_min'),
            'txtName.max' => trans('managing_user.name_max'),
            'txtPhone.required' => trans('managing_user.phone_required'),
            'txtPhone.digits_between' => trans('managing_user.phone_digits'),
            'txtAddress.required' => trans('managing_user.address_required'),
            'txtAddress.min' => trans('managing_user.address_min'),
            'txtAddress.max' => trans('managing_user.address_max'),
        ];
    }
}
