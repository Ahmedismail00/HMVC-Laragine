<?php

namespace Core\Attachment\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttachmentRequest extends FormRequest
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
                    'path' => 'string|required',
                    'type' => 'required',
                    'usage' => 'string|required',
                    'display_name' => 'string|required',
                    'attachmentable_type' => 'string|required',
                    'attachmentable_id' => 'integer|required',

                ];
            }
            case 'PUT': {
                return [
                    'path' => 'string|required',
                    'type' => 'required',
                    'usage' => 'string|required',
                    'display_name' => 'string|required',
                    'attachmentable_type' => 'string|required',
                    'attachmentable_id' => 'integer|required',

                ];
            }
        }
    }
}
