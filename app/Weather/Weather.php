<?php


namespace App\Weather;


use Illuminate\Support\Facades\Http;

class Weather
{
    private string $endpoint;

    private string $key;

    private string $name;

    /**
     * Weather constructor.
     */
    public function __construct()
    {
        $this->endpoint = config('services.weather.endpoint');
        $this->key = config('services.weather.key');
    }

    /**
     * Create an instance of ClientBuilder
     */
    public static function create(): static
    {
        return new static();
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function get()
    {
        $params = [
            'q' => $this->name,
            'appid' => $this->key,
            'units' => 'metric',
        ];

        $response = Http::get($this->endpoint, $params);

        return $response->json();
    }
}
