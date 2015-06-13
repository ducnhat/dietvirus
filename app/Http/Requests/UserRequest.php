<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
                    'name'          => 'required|min:1|max:50',
                    'phone'         => 'required|digits_between:7,11',
                    'email'         => 'required|email|unique:users,email',
                    'password'      => 'required|min:5|max:20',
                    'repassword'    => 'required|same:password',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name'          => 'required|min:1|max:50',
                    'phone'         => 'required|digits_between:7,11',
                    'email'         => 'required|email|unique:users,email,' . $this->get('id'),
                    'password'      => 'min:5|max:20',
                    'repassword'    => 'required_with:password|same:password',
                ];
            }
            default:break;
        }
    }
}
