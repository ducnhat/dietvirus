<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostRequest extends Request
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
                    'title' => 'required',
                    'description' => 'required',
                    'image' => 'required',
                    'content' => 'required',
                    'publish_at' => 'required',
                    'category_id' => 'required',
                    'user_id' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'title' => 'required',
                    'description' => 'required',
                    'content' => 'required',
                    'publish_at' => 'required',
                    'category_id' => 'required',
                    'user_id' => 'required',
                ];
            }
            default:break;
        }
    }
}
