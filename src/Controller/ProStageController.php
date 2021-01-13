<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Stage;

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
        //Récuperer le répertoire de l'entité stage
        $repStage = $this->getDoctrine()->getRepository(Stage::class);

        //Récuperer ce qui a été saved dans la BD
        $stages = $repStage->findAll();

        //Envoyer les ressources récupérer à la vue chargée pour les affichers
        return $this->render('pro_stage/accueil.html.twig',['stages'=>$stages]);
    }

}
