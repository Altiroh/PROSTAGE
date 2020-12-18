<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProStageController extends AbstractController
{
    /**
     * @Route("/", name="prostage_accueil")
     */
    public function index(): Response
    {
        return $this->render('pro_stage/index.html.twig', [
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
     * @Route("/select", name="prostage_select")
     */
    public function select(): Response
    {
        return $this->render('pro_stage/select.html.twig', [
            'controller_name' => 'Contrôleur ProStage',
        ]);
    }
}
