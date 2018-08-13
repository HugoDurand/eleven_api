<?php

namespace App\Service;

use App\Entity\Planete;
use Doctrine\ORM\EntityManager;

class PlaneteService{

    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }


    public function getPlaneteById($id){


        //$planete = $em->getRepository

       // return $planete;
    }
/*
$planete = $this->getDoctrine()
->getRepository(Planete::class)
->find($request->get('id'));*/

}