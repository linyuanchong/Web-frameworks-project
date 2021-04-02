<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    private function createUser($username, $plainPassword, $role = 'ROLE_USER'):User
    {
        $user = new User();
        $user->setEmail($username);
        $user->setRole($role);

        // password - and encoding
        $encodedPassword = $this->passwordEncoder->encodePassword($user, $plainPassword);
        $user->setPassword($encodedPassword);
        return $user;
    }

    public function load(ObjectManager $manager)
    {
        // create objects
        $rumiAdmin = $this->createUser('rumiAdmin@email.com', 'rumi', 'ROLE_ADMIN');
        $setantaAdmin = $this->createUser('setantaAdmin@email.com', 'setanta', 'ROLE_ADMIN');
        $serenureAdmin = $this->createUser('serenureAdmin@email.com', 'serenure', 'ROLE_ADMIN');

        // add to DB queue
        $manager->persist($rumiAdmin);
        $manager->persist($setantaAdmin);
        $manager->persist($serenureAdmin);

        // send query to DB
        $manager->flush();
    }

}
