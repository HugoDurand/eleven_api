<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class TestPlanete extends WebTestCase{



    public function testgetPlanete()
    {
        $client = static::createClient();

        $client->request('GET', '/planete');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        
        $this->assertTrue($client->getResponse()->headers->contains('Content-Type', 'application/json'));
    }



    public function testgetPlaneteById()
    {
        $client = static::createClient();

        $client->request('GET', '/planete/{id}');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        
        $this->assertTrue($client->getResponse()->headers->contains('Content-Type', 'application/json'));
    }



    public function testcreatePlanete()
    {
        $client = static::createClient();

        $client->request('POST', '/planete');

        $this->assertEquals(201, $client->getResponse()->getStatusCode());

        $this->assertTrue($client->getResponse()->headers->contains('Content-Type', 'application/json'));
    }
    

    public function testputPlanete()
    {
        $client = static::createClient();

        $client->request('PUT', '/planete/{id}');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertTrue($client->getResponse()->headers->contains('Content-Type', 'application/json'));
    }


    public function testdeletePlanete()
    {
        $client = static::createClient();

        $client->request('DELETE', '/planete/{id}');

        $this->assertEquals(204, $client->getResponse()->getStatusCode());

        $this->assertTrue($client->getResponse()->headers->contains('Content-Type', 'application/json'));
    }
    

}