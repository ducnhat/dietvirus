<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class WarrantyRequest extends Request
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
                    'resolve' => 'required_if:is_warranted,0',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'resolve' => 'required_if:is_warranted,0',
                ];
            }
            default:break;
        }
    }
}
