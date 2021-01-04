<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ProStageController extends AbstractController
{
    /**
     * @Route("/stage{idStage}", name="prostage_stage")
     */
    public function stageSelect($idStage): Response
    {
        return $this->render('pro_stage/stageSelect.html.twig',['idStage' => $idStage,]);
    }
    /**
     * @Route("/filtrage", name="prostage_filtrage")
     */
    public function filtrage(): Response
    {
        return $this->render('pro_stage/filtrage.html.twig');
    }
    /**
     * @Route("/", name="prostage_accueil")
     */
    public function accueil(): Response
    {
        return $this->render('pro_stage/accueil.html.twig');
    }

}
