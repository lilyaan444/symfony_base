<?php

namespace App\DataFixtures;

use App\Entity\Burger;
use App\Entity\Pain;
use App\Entity\Oignon;
use App\Entity\Sauce;
use App\Entity\Image;
use App\Entity\Commentaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Pains
        $pain1 = new Pain();
        $pain1->setName('Pain classique');
        $manager->persist($pain1);

        $pain2 = new Pain();
        $pain2->setName('Pain au sésame');
        $manager->persist($pain2);

        // Oignons
        $oignon1 = new Oignon();
        $oignon1->setName('Oignons blancs');
        $manager->persist($oignon1);

        $oignon2 = new Oignon();
        $oignon2->setName('Oignons rouges');
        $manager->persist($oignon2);

        // Sauces
        $sauce1 = new Sauce();
        $sauce1->setName('Sauce tomate');
        $sauce1 = new Sauce();
        $sauce1->setName('Ketchup');
        $manager->persist($sauce1);

        $sauce2 = new Sauce();
        $sauce2->setName('Moutarde');
        $sauce2 = new Sauce();
        $sauce2->setName('Mayonnaise');
        $manager->persist($sauce2);

        // Images
        $image1 = new Image();
        $image1->setName('Burger 1');
        $image1->setUrl('burger1.jpg');
        $manager->persist($image1);

        $image2 = new Image();
        $image2->setName('Burger 2');
        $image2->setUrl('burger2.jpg');
        $manager->persist($image2);

        // Burgers
        $burger1 = new Burger();
        $burger1->setName('Le Classique');
        $burger1->setPain($pain1);
        $burger1->setImage($image1);
        $burger1->setPrice(999); // Prix en centimes
        $manager->persist($burger1);

        $burger2 = new Burger();
        $burger2->setName('Le Veggie');
        $burger2->setPain($pain2);
        $burger2->setImage($image2);
        $burger2->setPrice(1099); // Prix en centimes
        $manager->persist($burger2);

        // Commentaires
        $commentaire1 = new Commentaire();
        $commentaire1->setName("commentaire 1");
        $commentaire1->setBurger($burger1);
        $commentaire1->setAuteur('John Doe');
        $commentaire1->setContenu('Excellent burger !');
        $manager->persist($commentaire1);

        $commentaire2 = new Commentaire();
        $commentaire2->setName("commentaire 2");
        $commentaire2->setBurger($burger2);
        $commentaire2->setAuteur('Jane Doe');
        $commentaire2->setContenu('Un peu cher mais très bon.');
        $manager->persist($commentaire2);

        $manager->flush();
    }
}
