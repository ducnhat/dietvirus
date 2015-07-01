<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class KeyRequest extends Request
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
                    'name' => 'required',
                    'email' => 'required|email',
                    'phone' => 'required|numeric',
                    'product_key_id' => 'required|exists:product_keys,key,deleted_at,NULL,warranty_at,NULL',

                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required',
                    'email' => 'required',
                    'phone' => 'required|numeric',
                    'product_key_id' => 'required|exists:product_keys,key,deleted_at,NULL,warranty_at,NULL',

                ];
            }
            default:break;
        }
    }
}
