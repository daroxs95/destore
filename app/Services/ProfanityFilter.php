<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ProfanityFilter
{
    private string $endpoint;
    private string $api_key;

    public function __construct()
    {
        $this->endpoint = config('services.profanityfilter.endpoint');
        $this->api_key = config('services.profanityfilter.api_key');
    }

    public function filter(string $text): string
    {
        try {
            $response = Http::acceptJson()
                ->withHeaders(["X-Api-Key" => $this->api_key])
                ->get($this->endpoint, [
                    'text' => $text,
                ]);

            return json_decode($response->body())->censored;
        } catch (\Throwable $th) {
            return $text;
        }
    }
}
