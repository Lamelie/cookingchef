<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TagFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $labels = [
            "vege"=>"Végétarien",
            "sanslactose"=>"Sans lactose",
            "sansglucose"=>"Sans gluten"];

        foreach ($labels as $key=>$label) {
            $tags = new Tag();
            $tags->setLabel($label);
            $manager->persist($tags);
            $this->addReference("tag-" . $key, $tags);
        }

        $manager->flush();
    }
}
