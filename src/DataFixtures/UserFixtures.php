<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setPseudo("lamelie");
        $admin->setEmail("ameliederoche@hotmail.com");
        $admin->setPassword($this->encoder->encodePassword($admin, "amelie" ));
        $admin->setRoles(["ROLE_ADMIN"]);
        $manager->persist($admin);
        $this->addReference("user-admin", $admin);

        $user = new User();
        $user->setPseudo("jdupont");
        $user->setEmail('mail@mail.com');
        $user->setPassword($this->encoder->encodePassword($user, "amelie" ));
        $manager->persist($user);
        $this->addReference("user-jdupont", $user);


        $manager->flush();
    }
}
