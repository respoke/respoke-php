<?php 

namespace Respoke;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Subscriber\Log\LogSubscriber;
use GuzzleHttp\Subscriber\Log\Formatter;

class Client {
    private $appId;
    private $appSecret;
    private $roleId;
    private $endpointId;
    private $guzzle;
    private $tokenId;
    
    public function __construct($args = []) {
        $this->appId = $args["appId"];
        $this->appSecret = $args["appSecret"];
        $this->roleId = $args["roleId"];
        $this->endpointId = $args["endpointId"];
        
        $this->guzzle = new GuzzleHttpClient([
            'base_url' => ['https://api.respoke.io/{version}/', ['version' => 'v1']],
            'defaults' => [
                'headers' => [
                    'Content-type' => 'application/json',
                    'App-Secret' => $this->appSecret
                ]
            ]
        ]);
                    
        $this->guzzle->getEmitter()->attach(new LogSubscriber(null, Formatter::DEBUG));
    }
    
    public function __destruct() {
        unset($this->guzzle);
    }
    
    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }
    
    public function getTokenId() {
        try {
            $response = $this->guzzle->post('tokens', [
                'body' => json_encode([
                    'appId' => $this->appId,
                    'endpointId' => $this->endpointId,
                    'roleId' => $this->roleId,
                    'ttl' => 3600
                ])
            ]);
                
            $this->tokenId = $response->json()['tokenId'];
        } catch (RequestException $e) {
            $statusCode = $e->getResponse()->getStatusCode();   
            
        } catch (Exception $e) {
            
        }

        return $this->tokenId;
    }
}