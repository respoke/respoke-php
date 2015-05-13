<?php 

namespace Respoke;

use GuzzleHttp\Client as GuzzleHttpClient;

class Client {
    private $appId;
    private $appSecret;
    private $roleId;
    private $endpointId;
    private $http;
    private $baseURL;
    
    public function __construct($args = []) {
        $this->appId = $args["appId"];
        $this->appSecret = $args["appSecret"];
        $this->roleId = $args["roleId"];
        $this->endpointId = $args["endpointId"];
        
        $this->baseURL = "https://api.respoke.io/v1";
        
        $this->http = new GuzzleHttpClient([
            'base_url' => $this->baseURL,
            'defaults' => [
                'headers' => [
                    'Content-type' => 'application/json',
                    'App-Secret' => $this->appSecret
                ]
            ]
        ]);
    }
    
    public function __destruct() {

    }
    
    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }
    
    public function getTokenId() {
        $response = $this->http->post('/tokens', [
            'body' => [
                'appId' => $this->appId,
                'endpointId' => $this->endpointId,
                'roleId' => $this->roleId,
                'ttl' => 3600
            ]
        ]);
                
        var_dump($response);
    }
}