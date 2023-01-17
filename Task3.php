<?php
class Concept {
    private $client;
    
    public const file = 'file';
    public const db = 'db';
    public const server = 'server memory';
    public const cloud = 'cloud';

    public function __construct() {
        $this->client = new \GuzzleHttp\Client();
    }

    public function getUserData() {
        $params = [
            'auth' => ['user', 'pass'],
            'token' => $this->getSecretKey()
        ];

        $request = new \Request('GET', 'https://api.method', $params);
        $promise = $this->client->sendAsync($request)->then(function ($response) {
            $result = $response->getBody();
        });

        $promise->wait();
    }

    public function getSecretKey(db){
        return true;
    }
}
?>