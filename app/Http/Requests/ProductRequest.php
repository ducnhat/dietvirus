<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
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
                    'name'          => 'required|min:1|max:50|unique:products,name',
                    'image'         => 'required',
                    'price'         => 'required|numeric|min:0',
                    'manufacturer'  => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name'          => 'required|min:1|max:50|unique:products,name,' . $this->get('id'),
                    'price'         => 'required|numeric|min:0',
                    'manufacturer'  => 'required',
                ];
            }
            default:break;
        }
    }
}
