<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductKeyRequest extends Request
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
                    'key' => 'required|unique:product_keys,key'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'key' => 'required|unique:product_keys,key,' . $this->get('id'),
                ];
            }
            default:break;
        }
    }
}
