<?php

namespace App\app;

class Todos
{
    const API_URL = 'https://jsonplaceholder.typicode.com/todos';

    public function getTodos() {
        $client = new \GuzzleHttp\Client();

        try {
            $response = $client->request('GET', self::API_URL);
            return json_decode($response->getBody(), true);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            return [];
        }
    }

}