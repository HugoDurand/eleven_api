<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TestPlanete extends WebTestCase{



    /**
     * Testing api get data
     */

    public function testgetPlanete()
    {
        $client = static::createClient();

        $client->request('GET', '/api/planete');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        
        $this->assertTrue($client->getResponse()->headers->contains('Content-Type', 'application/json'));
        

    }


    /**
     * Testing api get data by id (don't forget to use an harcoded id who match with an existing id in the database )
     */
    public function testgetPlaneteById()
    {
        $client = static::createClient();

        $client->request('GET', '/api/planete/8');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        
        $this->assertTrue($client->getResponse()->headers->contains('Content-Type', 'application/json'));
    }



    /**
     * Testing api create data
     */
    public function testcreatePlanete()
    {
        $client = static::createClient();
        

        $client->request('POST', '/api/planete', array('nom' => 'mercure', 'ordre' => 1, 'couleur' => 'rouge'));

        $this->assertEquals(201, $client->getResponse()->getStatusCode());

        $this->assertTrue($client->getResponse()->headers->contains('Content-Type', 'application/json'));
        
        
        
    }


    /**
     * Testing api update data (don't forget to use an harcoded id who match with an existing id in the database )
     */
    public function testputPlanete()
    {
        $client = static::createClient();

        $client->request('PUT','/api/planete/8', array('nom' => 'mercure', 'ordre' => 1, 'couleur' => 'rouge'));

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertTrue($client->getResponse()->headers->contains('Content-Type', 'application/json'));
    }



    /**
     * Testing api delete data (don't forget to use an harcoded id who match with an existing id in the database )
     */
    public function testdeletePlanete()
    {
        $client = static::createClient();

        $client->request('DELETE', '/api/planete/9');

        $this->assertEquals(204, $client->getResponse()->getStatusCode());
    }
    

}