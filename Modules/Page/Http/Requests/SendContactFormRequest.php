<?php

namespace Modules\Page\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidRecaptcha;

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
            'description' => 'required|min:5',
            'g-recaptcha-response' => ['required', new ValidRecaptcha]
        ];
    }

    public function messages() {
        return [
            // 'email.required' => 'Field is required',
            // 'email.email' => 'Field format is bad',
            // 'email.regex' => 'Field format is invalid',
            // 'description.required' => 'Field is required',
            // 'description.min' => "It's not enought",
            // 'g-recaptcha-response.required' => 'Captcha is required'
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
