<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use GuzzleHttp\Client;
use Modules\Core\Entities\SystemErrorEntity;

class ValidRecaptcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        try {
            $client = new Client([
                'base_uri' => 'https://google.com/recaptcha/api/',
                'verify' => (env('APP_ENV') == 'production') ? true : false
            ]);

            $response = $client->post('siteverify', [
                'query' => [
                    'secret' => env('GOOGLE_RECAPTCHA_SECRET'),
                    'response' => $value
                ]
            ]);

            return json_decode($response->getBody())->success;
        } catch (\Throwable $th) {
            SystemErrorEntity::createEntity('ValidRecaptcha rule reCaptcha v2 ERROR', [
                'message' => $th->getMessage()
            ]);

            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Captcha ERROR! Try again';
    }
}
