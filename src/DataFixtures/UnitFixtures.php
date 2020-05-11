<?php

namespace App\DataFixtures;

use App\Entity\Unit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UnitFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $labels = [
            "caf"=>"cuillère(s)-à-café",
            "litre"=>"litre(s)",
            "gramme"=>"g"];

        foreach ($labels as $key=>$label) {
            $units = new Unit();
            $units->setLabel($label);
            $manager->persist($units);
            $this->addReference("unit-" . $key, $units);
        }

        $manager->flush();
    }
}
