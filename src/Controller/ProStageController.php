<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Stage;
use App\Entity\Formation;
use App\Entity\Entreprise;

class ProStageController extends AbstractController
{
    /**
     * @Route("/stage{idStage}", name="prostage_stage")
     */
    public function stageSelect($idStage): Response
    {
      //Récuperer le répertoire de l'entité stage
      $repStage = $this->getDoctrine()->getRepository(Stage::class);
      //Récuperer ce qui a été saved dans la BD
      $stage = $repStage->find($idStage);
      return $this->render('pro_stage/stageSelect.html.twig',['stage' => $stage]);
    }
    /**
     * @Route("/filtrage", name="prostage_filtrage")
     */
    public function filtrage(): Response
    {
      //Récuperer le répertoire de l'entité formation
      $repForm = $this->getDoctrine()->getRepository(Formation::class);
      //Récuperer ce qui a été saved dans la BD
      $formations = $repForm->findAll();
      //Récuperer le répertoire de l'entité entreprise
      $repEtp = $this->getDoctrine()->getRepository(Entreprise::class);
      //Récuperer ce qui a été saved dans la BD
      $entreprises = $repEtp->findAll();
    return $this->render('pro_stage/filtrage.html.twig',['formations'=>$formations,'entreprises'=>$entreprises]);
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
    /**
     * @Route("/formation-{nom}", name="prostage_selectForm")
     */
    public function selectForm($nom): Response
    {
      //Récuperer le répertoire de l'entité stage
      $repStage = $this->getDoctrine()->getRepository(Stage::class);
      //Récuperer ce qui a été saved dans la BD
      $stage = $repStage->find($nom);
      return $this->render('pro_stage/stageSelect.html.twig',['stages' => $stages]);
    }
    /**
     * @Route("/enterprise-{nom}", name="prostage_selectForm")
     */
    public function selectForm($nom): Response
    {
      //Récuperer le répertoire de l'entité stage
      $repStage = $this->getDoctrine()->getRepository(Stage::class);
      //Récuperer ce qui a été saved dans la BD
      $stage = $repStage->find($nom);
      return $this->render('pro_stage/stageSelect.html.twig',['stages' => $stages]);
    }

}
