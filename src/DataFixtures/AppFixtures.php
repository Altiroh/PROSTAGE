<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Entreprise; //Précise où est ce que l'on utilise
use App\Entity\Formation;
use App\Entity\Stage;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //===Générateur de fausse donnée (En français)===

        $faker = \Faker\Factory::create('fr_FR');

        //===ZONE Formation===
          //On créer d'abord les données de formation on aura besoin après.

          //en dur dans le code , car on a besoin de formations particulières.
        $dutInf = new Formation();
        $dutInf->setFormation("DUT Informatique");

        $dutGim = new Formation();
        $dutGim->setFormation("DUT Génie industriel et maintenance");

        $lpMdN = new Formation();
        $lpMdN->setFormation("LP Métiers du Numérique");

        $lpPA = new Formation();
        $lpPA->setFormation("LP Programmation avancée");

        /*On regroupe tout dans un tableau pour ne pas avoir à
        dupliquer la fonction persist*/
        $tabFormations = array($dutInf,$dutGim,$lpMdN,$lpPA);
        foreach ($tabFormations as $formation)
        {
            $manager->persist($formation);
        }

        //===ZONE Entreprise====
          //Créer des activités d'entreprises
          $listActEtp = array("Agroalimentaire", "Banque", "Assurance", "Bois",
          "Papier", "Carton", "Imprimerie", "BTP", "Matériaux de construction",
          "Chimie", "Parachimie", "Commerce", "Négoce", "Distribution", "Édition",
          "Communication", "Multimédia", "Électronique", "Électricité",
          "Études et conseils", "Industrie", "pharmaceutique", "Informatique",
          "Télécoms Machines et équipements", "Automobile", "Métallurgie",
          "Plastique & Caoutchouc", "Services aux entreprises", "Transports & Logistique");

          //Générer test de  10 entreprises
          $nbEtp = 10;

          //Parcours du tableau
          for ($i=0; $i <= $nbEtp ; $i++)
          {
            $etp = new Entreprise();//Instanciation d'une entreprise
            //Préciser ses attributs
            $etp->setNom($faker->company);//random compagny
            /*cas particulier pour l'activité , le bs du Faker ne
            fonctionnant pas j'ai créer moi même un jeu de d'activité*/
            //$randomAct = array_rand(array $listActEtp, int $num=1);
            $etp->setActivite($faker->randomElement($listActEtp));//random activité
            $etp->setAdresse($faker->address);//random adress
            $manager->persist($etp);

            //===ZONE Stage===
            $nbStage = $faker->numberBetween($min=1, $max=4);
            for($j=1; $j <= $nbStage ; $j++)
            {
              //Instanciation
              $stage = new Stage();
              //Précsion de ses attributs
                //titre de stage (composé)
                  $type=$faker->jobTitle;
                  $ville=$faker->city;
                  $nbMois=$faker->numberBetween($min=1, $max=4);
                $stage->setTitre($type." (".$ville.") - ".$nbMois." mois");
                $stage->setDescription($faker->realText($maxNbChars=200, $indexSize=2));
                $stage->setEmail($faker->company."@".$faker->safeEmailDomain);
              //Enregistrement
              $manager->persist($stage);

              //Ajout à l'entreprise en question
              $etp->addStage($stage);
              $manager->persist($etp);//enregistrement de l'ajout

              /*Faire le lien entre le stage proposé par l'entreprises
              et les formations qui sont concernées */
                //Génération d'un nombre random de formations concernées
              $nbFormation = $faker->numberBetween($min=1, $max=2);

              //Association
              for ($k=0 ; $k <= $nbFormation ; $k++)
              {
                //Numéro de la formation qui est concernées par le stage
                $idFormation = $faker->numberBetween($min=0, $max=3);
                /*On recherche dans le tableau que l'on à créer
                dans la zone formation et on ajoute le stage*/
                $tabFormations[$idFormation]->addStage($stage);
                //enregristrement des modifications
                $manager->persist($tabFormations[$idFormation]);
              }
            }
          }
        //On pousse le tout !
        $manager->flush();
    }
}
