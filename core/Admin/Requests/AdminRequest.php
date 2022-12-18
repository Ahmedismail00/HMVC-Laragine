<?php

namespace Core\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
                    'name' => 'string|required',
                    'email' => 'string|required',
                    'password' => 'string|required',
                    'phone' => 'string|required',
                    'is_active' => 'required',
                    'type' => 'required',

                ];
            }
            case 'PUT': {
                return [
                    'name' => 'string|required',
                    'email' => 'string|required',
                    'password' => 'string|required',
                    'phone' => 'string|required',
                    'is_active' => 'required',
                    'type' => 'required',

                ];
            }
        }
    }
}
