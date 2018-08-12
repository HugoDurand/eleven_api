<?php

namespace App\Controller;

use App\Entity\Planete;
use App\Form\PlaneteType;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class PlaneteController extends FOSRestController
{
    /**
     * @Rest\View(statusCode=Response::HTTP_OK)
     * @Rest\Get("/planete")
     */
    public function getPlanetesAction(Request $request){

        $planete = $this->getDoctrine()
            ->getRepository(Planete::class)
            ->findAll();

        if (empty($planete)) {
            return new JsonResponse(['message' => 'not found'], Response::HTTP_NOT_FOUND);
        }


        return $planete;

    }


    /**
     * @Rest\View(statusCode=Response::HTTP_OK)
     * @Rest\Get("/planete/{id}")
     */
    public function getPlaneteActionById(Request $request){

        $planete = $this->getDoctrine()
            ->getRepository(Planete::class)
            ->find($request->get('id'));;

        if (empty($planete)) {
            return new JsonResponse(['message' => 'not found'], Response::HTTP_NOT_FOUND);
        }

        return $planete;
    }



    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/planete")
     */
    public function postPlaneteAction(Request $request){

        $planete = new Planete();
        $form = $this->createForm(PlaneteType::class, $planete);

        $form->submit($request->request->all());

        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($planete);
            $em->flush();

            return $planete;
        } else {
            return $form;
        }


    }


    /**
     * @Rest\View(statusCode=Response::HTTP_OK)
     * @Rest\Put("/planete/{id}")
     */
    public function putPlaneteAction(Request $request){

        $planete = $this->getDoctrine()
            ->getRepository(Planete::class)
            ->find($request->get('id'));;


        if (empty($planete)) {
            return new JsonResponse(['message' => 'Annonce not found'], Response::HTTP_NOT_FOUND);
        }

        $form = $this->createForm(PlaneteType::class, $planete);

        $form->submit($request->request->all());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->merge($planete);
            $em->flush();

            return $planete;

        } else {
            return $form;
        }


    }


    /**
     * @Rest\View(statusCode=Response::HTTP_OK)
     * @Rest\Patch("/planete/{id}")
     */
    public function patchPlaneteAction(Request $request){

        $planete = $this->getDoctrine()
            ->getRepository(Planete::class)
            ->find($request->get('id'));;


        if (empty($planete)) {
            return new JsonResponse(['message' => 'Annonce not found'], Response::HTTP_NOT_FOUND);
        }

        $form = $this->createForm(PlaneteType::class, $planete);

        $form->submit($request->request->all());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->merge($planete);
            $em->flush();

            return $planete;

        } else {
            return $form;
        }


    }


    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Delete("/planete/{id}")
     */
    public function deletePlaneteAction(Request $request){

        $planete = $this->getDoctrine()
            ->getRepository(Planete::class)
            ->find($request->get('id'));;


        if ($planete) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($planete);
            $em->flush();
        }


    }
    

}
