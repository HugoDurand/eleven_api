<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TestPlanete extends WebTestCase{



    public function testgetPlanete()
    {
        $client = static::createClient();

        $client->request('GET', '/api/planete');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        
        $this->assertTrue($client->getResponse()->headers->contains('Content-Type', 'application/json'));
        

    }



    public function testgetPlaneteById()
    {
        $client = static::createClient();

        $client->request('GET', '/api/planete/{id}');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        
        $this->assertTrue($client->getResponse()->headers->contains('Content-Type', 'application/json'));
    }



    public function testcreatePlanete()
    {
        $client = static::createClient();

        $client->request('POST', '/api/planete');

        $this->assertEquals(201, $client->getResponse()->getStatusCode());

        $this->assertTrue($client->getResponse()->headers->contains('Content-Type', 'application/json'));
    }
    

    public function testputPlanete()
    {
        $client = static::createClient();

        $client->request('PUT', '/api/planete/{id}');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertTrue($client->getResponse()->headers->contains('Content-Type', 'application/json'));
    }


    public function testdeletePlanete()
    {
        $client = static::createClient();

        $client->request('DELETE', '/api/planete/{id}');

        $this->assertEquals(204, $client->getResponse()->getStatusCode());

        $this->assertTrue($client->getResponse()->headers->contains('Content-Type', 'application/json'));
    }
    

}