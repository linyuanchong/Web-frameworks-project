<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class AppFixtures extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
//        $user1 = new User();
//        $user1->setUsername('matt');
//        $user1->setRole('ROLE_ADMIN');
//        $plainTextPassword = 'smith';
//        $encodedPassword = $this->passwordEncoder->encodePassword($user1, $plainTextPassword);
//        $user1->setPassword($encodedPassword);

        $user1 = $this->createUser('matt', 'smith', 'ROLE_ADMIN');

        // default ROLE is ROLE_USER
        $user2 = $this->createUser('john', 'doe');

        $manager->persist($user1);
        $manager->persist($user2);
        $manager->flush();

    }

    private function createUser($username, $plainPassword, $role = 'ROLE_USER'):User
    {
        $user = new User();
        $user->setUsername($username);
        $user->setRole($role);
// password - and encoding
        $encodedPassword = $this->passwordEncoder->encodePassword($user, $plainPassword);
        $user->setPassword($encodedPassword);
        return $user;
    }

}
