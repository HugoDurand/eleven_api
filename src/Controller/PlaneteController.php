<?php

namespace App\Controller;

use App\Entity\Planete;
use App\Form\PlaneteType;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use App\Service\PlaneteService;

class PlaneteController extends FOSRestController
{
    /**
     * @Rest\View(statusCode=Response::HTTP_OK)
     * @Rest\Get("/planete")
     */
    public function getPlanetesAction(PlaneteService $planeteService){

        $planete = $planeteService->getPlanete();

        if (empty($planete)) {
            return new JsonResponse(['message' => 'not found'], Response::HTTP_NOT_FOUND);
        }

        return $planete;

    }


    /**
     * @Rest\View(statusCode=Response::HTTP_OK)
     * @Rest\Get("/planete/{id}")
     */
    public function getPlaneteActionById(Request $request, PlaneteService $planeteService){


        $planete = $planeteService->getPlaneteById($request->get('id'));

        if (empty($planete)) {
            return new JsonResponse(['message' => 'not found'], Response::HTTP_NOT_FOUND);
        }

        return $planete;
    }



    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/planete")
     */
    public function postPlaneteAction(Request $request, PlaneteService $planeteService){

        $planete = new Planete();

        $form = $this->createForm(PlaneteType::class, $planete);

        $form->submit($request->request->all());

        if($form->isValid()){
            
            $planeteService->flushData($planete);

            return $planete;
        } else {
            return $form;
        }


    }


    /**
     * @Rest\View(statusCode=Response::HTTP_OK)
     * @Rest\Put("/planete/{id}")
     */
    public function putPlaneteAction(Request $request, PlaneteService $planeteService){

        $planete = $planeteService->getPlaneteById($request->get('id'));
        
        if (empty($planete)) {
            return new JsonResponse(['message' => 'Annonce not found'], Response::HTTP_NOT_FOUND);
        }

        $form = $this->createForm(PlaneteType::class, $planete);

        $form->submit($request->request->all());

        if ($form->isValid()) {
            
            $planeteService->flushData($planete);

            return $planete;

        } else {
            return $form;
        }


    }
    


    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Delete("/planete/{id}")
     */
    public function deletePlaneteAction(Request $request, PlaneteService $planeteService){


        $planete = $planeteService->getPlaneteById($request->get('id'));


        if ($planete) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($planete);
            $em->flush();
        }


    }
    

}
