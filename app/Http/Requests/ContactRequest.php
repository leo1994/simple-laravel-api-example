<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        $isPost = $this->isMethod('post');
        return [
            'first_name' => 'alpha_spaces' . ($isPost ? '|required' : ''),
            'last_name' => 'alpha_spaces' . ($isPost ? '|required' : ''),
            'phone' => 'phones',
            'email' => 'email' . ($isPost ? '|required' : ''),
        ];
    }
}
