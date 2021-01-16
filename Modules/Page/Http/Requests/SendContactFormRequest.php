<?php

namespace Modules\Page\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendContactFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'description' => 'required|min:5'
        ];
    }

    public function messages() {
        return [
            'email.required' => 'Field is required',
            'email.email' => 'Field format is bad',
            'email.regex' => 'Field format is invalid',

            'description.required' => 'Field is required',
            'description.min' => "It's not enought",
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
