<?php

namespace App\DataFixtures;

use App\Entity\Club;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class ClubFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $c1 = new Club();
        $c1->setName('Rumi');
        $c1->setMemberCount(10);

        $c2 = new Club();
        $c2->setName('Setanta');
        $c2->setMemberCount(11);

        $c3 = new Club();
        $c3->setName('Serenure');
        $c3->setMemberCount(12);

        $manager->persist($c1);
        $manager->persist($c2);
        $manager->persist($c3);

        $manager->flush();
    }
}
