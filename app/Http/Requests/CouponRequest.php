<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CouponRequest extends Request
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'name'          => 'required',
                    'coupon'        => 'required|min:1|max:50|unique:coupon,coupon',
                    'condition'     => 'required|numeric|min:0',
                    'value'         => 'required|numeric|min:0',
                    'quantity'      => 'required|integer|min:0',
                    'start_date'    => 'required',
                    'end_date'      => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name'          => 'required',
                    'coupon'        => 'required|min:1|max:50|unique:coupon,coupon,' . $this->get('id'),
                    'condition'     => 'required|numeric|min:0',
                    'value'         => 'required|numeric|min:0',
                    'quantity'      => 'required|integer|min:0',
                    'start_date'    => 'required',
                    'end_date'      => 'required',
                ];
            }
            default:break;
        }
    }
}
