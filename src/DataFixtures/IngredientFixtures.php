<?php


namespace App\DataFixtures;


use App\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class IngredientFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $labels = [
            "farine"=>"Farine",
            "beurre"=>"Beurre",
            "pepite"=>"Pépites de chocolat",
            "sucre"=>"Sucre"];


        foreach ($labels as $key=>$label) {
            $ingredients = new Ingredient();
            $ingredients->setLabel($label);
            $manager->persist($ingredients);
            $this->addReference("ing-" . $key, $ingredients);
        }

        $manager->flush();
    }
}