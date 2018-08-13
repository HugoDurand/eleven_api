<?php

namespace App\Service;

use App\Entity\Planete;
use Doctrine\ORM\EntityManagerInterface;

class PlaneteService{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getPlanete()
    {
        $planete = $this
            ->entityManager
            ->getRepository(Planete::class)
            ->findAll();

        return $planete;

    }
    
    public function getPlaneteById($id)
    {
        $planete = $this
            ->entityManager
            ->getRepository(Planete::class)
            ->find($id);
        
        return $planete;
        
    }
    
    public function flushData($planete){
        
        $this->entityManager->persist($planete);
        $this->entityManager->flush();
        
    }

    public function removeData($planete){

        $this->entityManager->remove($planete);
        $this->entityManager->flush();

    }

}