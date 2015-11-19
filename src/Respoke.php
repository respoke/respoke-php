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
    private $log;

    private function getSDKHeader() {
        $phpVersion = phpversion();
        $respokeVersion = json_decode(file_get_contents(realpath(__DIR__ .'/../composer.json')))->version;
        $osVersion = sprintf('%s %s', php_uname('s'), php_uname('r'));
        return sprintf('Respoke-PHP/%s (%s) PHP/%s', $respokeVersion, $osVersion, $phpVersion);
    }

    public function __construct($args = []) {
        $this->appId = @$args["appId"];
        $this->appSecret = @$args["appSecret"];
        $this->roleId = @$args["roleId"];
        $this->endpointId = @$args["endpointId"];
        $this->baseUrl = @$args['baseUrl'] ?: 'https://api.respoke.io/v1/';

        $this->guzzle = new GuzzleHttpClient([
            'base_url' => $this->baseUrl,
            'defaults' => [
                'headers' => [
                    'Content-type' => 'application/json',
                    'App-Secret' => $this->appSecret,
                    'Respoke-SDK' => $this->getSDKHeader()
                ]
            ]
        ]);
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
            $reasonPhrase = $e->getResponse()->getReasonPhrase();
            $statusCode = $e->getResponse()->getStatusCode();
        } catch (Exception $e) {

        }

        return $this->tokenId;
    }
}
