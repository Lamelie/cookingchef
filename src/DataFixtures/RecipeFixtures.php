<?php

namespace App\DataFixtures;

use App\Entity\Recipe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RecipeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $cookie = new Recipe();
        $cookie->setTitle("Cookies");
        $cookie->setBakingTime(new \DateTime("2020-01-01 00:09:00"));
        $cookie->setPreparationTime(new \DateTime("2020-01-01 00:15:00"));
        $cookie->setNbPersons(4);
        $cookie->setPicture("cookies.jpg");
        $cookie->setCategory($this->getReference("cat-dessert"));
        $cookie->setDifficulty($this->getReference("diff-facile"));
        $cookie->addTag($this->getReference("tag-sansglucose"));
        $cookie->addTag($this->getReference("tag-sanslactose"));
        $manager->persist($cookie);

        $crumble = new Recipe();
        $crumble->setTitle("Crumble");
        $crumble->setBakingTime(new \DateTime("2020-01-01 00:30:00"));
        $crumble->setPreparationTime(new \DateTime("2020-01-01 00:25:00"));
        $crumble->setNbPersons(6);
        $crumble->setPicture("crumble.jpg");
        $crumble->setCategory($this->getReference("cat-dessert"));
        $crumble->setDifficulty($this->getReference("diff-facile"));
        $crumble->addTag($this->getReference("tag-vege"));
        $crumble->addTag($this->getReference("tag-sanslactose"));
        $manager->persist($crumble);

        $lasagne = new Recipe();
        $lasagne->setTitle("Lasagne");
        $lasagne->setBakingTime(new \DateTime("2020-01-01 00:45:00"));
        $lasagne->setPreparationTime(new \DateTime("2020-01-01 00:25:00"));
        $lasagne->setNbPersons(6);
        $lasagne->setPicture("lasagne.jpg");
        $lasagne->setCategory($this->getReference("cat-plat"));
        $lasagne->setDifficulty($this->getReference("diff-difficile"));
        $lasagne->addTag($this->getReference("tag-sanslactose"));
        $manager->persist($lasagne);


        $manager->flush();
    }

    public function getDependencies()
    {
        return [TagFixtures::class, CategoryFixtures::class, DifficultyFixtures::class];
    }
}
