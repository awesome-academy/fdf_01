<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManagingProductRequest extends FormRequest
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
            'txtName' => 'required',
            'txtDescription' => 'required',
            'txtPrice' => 'required|digits_between:4,7',
            'txtQuantity' => 'required|digits_between:1,7',
        ];
    }

    public function messages()
    {
        return [
            'txtName.required' => trans('managing_product.name_required'),
            'txtDescription.required' => trans('managing_product.description_required'),
            'txtPrice.required' => trans('managing_product.price_required'),
            'txtPrice.digits_between' => trans('managing_product.price_digits'),
            'txtQuantity.required' => trans('managing_product.qty_required'),
            'txtQuantity.digits_between' => trans('managing_product.qty_digits'),
        ];
    }
}
