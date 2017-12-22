<?php

namespace App\Http\Validations;

use GuzzleHttp\Client as Guzzle;
use Illuminate\Contracts\Validation\Rule;

class ValidateEmail extends Rule
{
    protected $message = "Message Goes here";


    public function __construct(Guzzle $cleint)
    {
        $this->client = $client;
    }

    public function passes($attribute, $value)
    {
        $response = $this->getMailGunResponse($value);

        if ($response->did_you_mean) {
            $this->message = $this->buildSuggestionError($response);
        }

        return $response->is_valid;
    }

    protected function buildSuggestionError($response)
    {
        return "{$this->message} Did you mean  {$response->did_you_mean}?";
    }

    public function message()
    {
        
    }

    protected function getMailGunResponse($address)
    {
        $request = $this->client->request('GET', 'https://api.mailgun.net/v3/address/validate', [
            'query' => [
                'api_key' => env('MAILGUN_KEY'),
                'address' => $address,
            ],
        ]);

        return json_decode($request->getBody());
    }
}