<?php

use Respoke\Client;
    
class ClientTest extends PHPUnit_Framework_TestCase {
    
    public function testCreateClientWithArgs() {
        $client = new Respoke\Client([
            "appId" => "c10a2075-3f3d-466f-82f9-d2285e64c5d4",
            "appSecret" => "eb327e57-e766-49de-b801-ef612a70509e",
            "roleId" => "371F82D1-E4CE-4BB0-B2BB-79EA3497FC4F",
            "endpointId" => "spock@enterprise.com"
        ]);
            
        $this->assertEquals("c10a2075-3f3d-466f-82f9-d2285e64c5d4", $client->appId);
        $this->assertEquals("eb327e57-e766-49de-b801-ef612a70509e", $client->appSecret);
        $this->assertEquals("371F82D1-E4CE-4BB0-B2BB-79EA3497FC4F", $client->roleId);
        $this->assertEquals("spock@enterprise.com", $client->endpointId);
    }
    
    public function testCreateClientWithOutArgs() {
        $client = new Respoke\Client();
            
        $this->assertEquals(null, $client->appId);
        $this->assertEquals(null, $client->appSecret);
        $this->assertEquals(null, $client->roleId);
        $this->assertEquals(null, $client->endpointId);
    }
    
    public function testCreateClientWithSomeArgs() {
        $client = new Respoke\Client([
            "appId" => "c10a2075-3f3d-466f-82f9-d2285e64c5d4",
            "appSecret" => "eb327e57-e766-49de-b801-ef612a70509e"
        ]);
            
        $this->assertEquals("c10a2075-3f3d-466f-82f9-d2285e64c5d4", $client->appId);
        $this->assertEquals("eb327e57-e766-49de-b801-ef612a70509e", $client->appSecret);
        $this->assertEquals(null, $client->roleId);
        $this->assertEquals(null, $client->endpointId);
    }
    
    public function testTokenIdNull() {
        $client = new Respoke\Client([
            "appId" => "c10a2075-3f3d-466f-82f9-d2285e64c5d4",
            "appSecret" => "eb327e57-e766-49de-b801-ef612a70509e",
            "roleId" => "371F82D1-E4CE-4BB0-B2BB-79EA3497FC4F",
            "endpointId" => "spock@enterprise.com"
        ]);
            
        $tokenId = $client->tokenId;
        $this->assertEquals(null, $tokenId);
    }
    
    public function testTokenIdNullWithInvalidAppSecret() {
        $client = new Respoke\Client([
            "appId" => "c10a2075-3f3d-466f-82f9-d2285e64c5d4",
            "appSecret" => "eb327e57-e766-49de-b801-ef612a70509x",
            "roleId" => "371F82D1-E4CE-4BB0-B2BB-79EA3497FC4F",
            "endpointId" => "spock@enterprise.com"
        ]);
            
        $tokenId = $client->tokenId;
        $this->assertEquals(null, $tokenId);
    }
    
    public function testGetTokenId() {
        $client = new Respoke\Client([
            "appId" => "c10a2075-3f3d-466f-82f9-d2285e64c5d4",
            "appSecret" => "eb327e57-e766-49de-b801-ef612a70509e",
            "roleId" => "371F82D1-E4CE-4BB0-B2BB-79EA3497FC4F",
            "endpointId" => "spock@enterprise.com"
        ]);
            
        $tokenId = $client->getTokenId();
        $this->assertRegExp('/^\{?[A-Z0-9]{8}-[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{12}\}?$/', $tokenId);
    }
    
}