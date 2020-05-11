<?php

namespace App\DataFixtures;

use App\Entity\RecipeIngredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RecipeIngredientFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $beurrecookie = new RecipeIngredient();
        $beurrecookie->setIngredient($this->getReference("ing-beurre"));
        $beurrecookie->setQuantity("100");
        $beurrecookie->setRecipe($this->getReference("rec-cookie"));
        $beurrecookie->setUnit($this->getReference("unit-gramme"));

        $manager->persist($beurrecookie);

        $sucrecookie = new RecipeIngredient();
        $sucrecookie->setIngredient($this->getReference("ing-sucre"));
        $sucrecookie->setQuantity("200");
        $sucrecookie->setRecipe($this->getReference("rec-cookie"));
        $sucrecookie->setUnit($this->getReference("unit-gramme"));

        $manager->persist($sucrecookie);

        $pepitecookie = new RecipeIngredient();
        $pepitecookie->setIngredient($this->getReference("ing-pepite"));
        $pepitecookie->setQuantity("200");
        $pepitecookie->setRecipe($this->getReference("rec-cookie"));
        $pepitecookie->setUnit($this->getReference("unit-gramme"));

        $manager->persist($pepitecookie);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [IngredientFixtures::class, RecipeFixtures::class];
    }

}

