<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Phone;
use App\Entity\Make;


class PhoneMake extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $make1 = new Make();
        $make1->setManufacturer('Apple');

        $make2 = new Make();
        $make2->setManufacturer('Samsung');

        $phone1 = new Phone();
        $phone1->setModel('iPhone X');
        $phone1->setMemory(64);

        $phone2 = new Phone();
        $phone2->setModel('Galaxy 10');
        $phone2->setMemory(256);

        $make1->addPhone($phone1);
        $make2->addPhone($phone2);

        $manager->persist($phone1);
        $manager->persist($phone2);
        $manager->persist($make1);
        $manager->persist($make2);

        $manager->flush();
    }
}
