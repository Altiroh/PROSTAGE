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
        //===ZONE EXEMPLE====
        // $product = new Product();
        // $manager->persist($product);
        //$manager->flush(); //Flush lance dans la BD

        //===ZONE Entreprise====
        $Dassault = new Entreprise();//Instanciation de l'Entreprise
          //préciser ces attributs;
          $Dassault->setNom("Dassault");
          $Dassault->setActivite("Aeronautique");
          $Dassault->setAdresse("8 Avenue Marcel Dassault, 64600 Anglet");

        $manager->persist($Dassault);
        $manager->flush();

        //===ZONE Formation====


        //===ZONE Stage====
    }
}
