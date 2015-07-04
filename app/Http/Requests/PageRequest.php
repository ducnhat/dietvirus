<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PageRequest extends Request
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
                    'name' => 'required|unique:pages,name',
                    'content' => 'required',
                    'show_on_menu' => 'required',
                    'is_published' => 'required',
                    'publish_at' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required|unique:pages,name,' . $this->get('id'),
                    'content' => 'required',
                    'show_on_menu' => 'required',
                    'is_published' => 'required',
                    'publish_at' => 'required',
                ];
            }
            default:break;
        }
    }
}
