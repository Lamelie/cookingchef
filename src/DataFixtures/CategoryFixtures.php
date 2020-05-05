<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $entree = new Category();
        $entree->setLabel("Entrée");
        $manager->persist($entree);
        $this->addReference("cat-entree", $entree);

        $plat = new Category();
        $plat->setLabel("Plat");
        $manager->persist($plat);
        $this->addReference("cat-plat", $plat);

        $dessert = new Category();
        $dessert->setLabel("Dessert");
        $manager->persist($dessert);
        $this->addReference("cat-dessert", $dessert);

        $manager->flush();
    }
}
