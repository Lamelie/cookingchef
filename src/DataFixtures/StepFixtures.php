<?php

namespace App\DataFixtures;

use App\Entity\Step;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class StepFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $cookiestep1 = new Step();
        $cookiestep1->setRecipe($this->getReference("rec-cookie"));
        $cookiestep1->setNumber(1);
        $cookiestep1->setDescription("Mélanger tous les ingrédients");

        $manager->persist($cookiestep1);

        $cookiestep2 = new Step();
        $cookiestep2->setRecipe($this->getReference("rec-cookie"));
        $cookiestep2->setNumber(2);
        $cookiestep2->setDescription("Créer des petites boules de 3/4 cm d'épaisseur");

        $manager->persist($cookiestep2);

        $cookiestep3 = new Step();
        $cookiestep3->setRecipe($this->getReference("rec-cookie"));
        $cookiestep3->setNumber(3);
        $cookiestep3->setDescription("Passer au four à 180°C pour 15 minutes.");

        $manager->persist($cookiestep3);


        $manager->flush();
    }

    public function getDependencies()
    {
        return [RecipeFixtures::class];
    }

}
