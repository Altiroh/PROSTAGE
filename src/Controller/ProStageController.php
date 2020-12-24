<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ProStageController extends AbstractController
{
    /**
     * @Route("/", name="prostage_start")
     */
    public function start(): Response
    {
        return $this->render('pro_stage/start.html.twig', [
            'controller_name' => 'Contrôleur ProStage',
        ]);
    }
    /**
     * @Route("/recherche", name="prostage_recherche")
     */
    public function recherche(): Response
    {
        return $this->render('pro_stage/recherche.html.twig', [
            'controller_name' => 'Contrôleur ProStage',
        ]);
    }
    /**
     * @Route("/filtrage", name="prostage_filtrage")
     */
    public function select(): Response
    {
        return $this->render('pro_stage/filtrage.html.twig', [
            'controller_name' => 'Contrôleur ProStage',
        ]);
    }
    /**
     * @Route("/accueil", name="prostage_accueil")
     */
    public function accueil(): Response
    {
        return $this->render('pro_stage/accueil.html.twig', [
            'controller_name' => 'Contrôleur ProStage',
        ]);
    }

}
