<?php

namespace App\DataFixtures;

use App\Entity\Book;
use App\Entity\Club;
use App\Entity\Comment;
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

    private function createUser($email, $plainPassword, $role = 'ROLE_USER', $name, $club):User
    {
        $user = new User();
        $user->setEmail($email);
        $user->setRole($role);
        $user->setName($name);
        $user->setClub($club);

        // password - and encoding
        $encodedPassword = $this->passwordEncoder->encodePassword($user, $plainPassword);
        $user->setPassword($encodedPassword);
        return $user;
    }

    public function load(ObjectManager $manager)
    {
        //CLUB.
        $c1 = new Club();
        $c1->setName('Rumi');
        $c1->setMemberCount(10);
        //
        $c2 = new Club();
        $c2->setName('Setanta');
        $c2->setMemberCount(11);
        //
        $c3 = new Club();
        $c3->setName('Serenure');
        $c3->setMemberCount(12);

        //ADMIN.
        $mainAdmin = $this->createUser('mainAdmin@email.com', 'main', 'ROLE_ADMIN', 'Main Admin', NULL);

        //STAFF.
        $rumiStaff = $this->createUser('rumiStaff@email.com', 'rumi', 'ROLE_STAFF', 'Rumi Staff', $c1);
        $setantaStaff = $this->createUser('setantaStaff@email.com', 'setanta', 'ROLE_STAFF', 'Setanta Staff', $c2);
        $serenureStaff = $this->createUser('serenureStaff@email.com', 'serenure', 'ROLE_STAFF', 'Serenure Staff', $c3);

        //USER.
        $u1 = $this->createUser('john@email.com', 'john', 'ROLE_USER', 'John', $c1);
        $u2 = $this->createUser('amanda@email.com', 'amanda', 'ROLE_USER', 'Amanda', $c1);
        $u3 = $this->createUser('donovan@email.com', 'donovan', 'ROLE_USER', 'Donovan', $c1);
        $u4 = $this->createUser('brendan@email.com', 'brendan', 'ROLE_USER', 'Brendan', $c2);
        $u5 = $this->createUser('josephine@email.com', 'josephine', 'ROLE_USER', 'Josephine', $c2);
        $u6 = $this->createUser('calvin@email.com', 'calvin', 'ROLE_USER', 'Calvin', $c2);
        $u7 = $this->createUser('gordon@email.com', 'gordon', 'ROLE_USER', 'Gordon', $c3);
        $u8 = $this->createUser('aaron@email.com', 'aaron', 'ROLE_USER', 'Aaron', $c3);
        $u9 = $this->createUser('parker@email.com', 'parker', 'ROLE_USER', 'Parker', $c3);

        //BOOKS.
        $b1 = new Book();
        $b1->setName("The Lord of the Rings");
        $b1->setClub($c1);
        $b1->setAuthor("J. R. R. Tolkien");
        $b1->setPublisher("Allen & Unwin");
        //
        $b2 = new Book();
        $b2->setName("The Apple");
        $b2->setClub($c1);
        $b2->setAuthor("G.R Martin");
        $b2->setPublisher("DSQ");
        //
        $b3 = new Book();
        $b3->setName("Oblivion");
        $b3->setClub($c1);
        $b3->setAuthor("S.Q Luther");
        $b3->setPublisher("The Grange");
        //
        $b4 = new Book();
        $b4->setName("Foxes and Hounds");
        $b4->setClub($c2);
        $b4->setAuthor("H.D King");
        $b4->setPublisher("Commonwealth");
        //
        $b5 = new Book();
        $b5->setName("Greys");
        $b5->setClub($c2);
        $b5->setAuthor("R.G White");
        $b5->setPublisher("Today's");
        //
        $b6 = new Book();
        $b6->setName("Spiderman and Batman");
        $b6->setClub($c2);
        $b6->setAuthor("S. Sebastian");
        $b6->setPublisher("Darvel Comics");
        //
        $b7 = new Book();
        $b7->setName("WHY?");
        $b7->setClub($c3);
        $b7->setAuthor("D. Mitchell");
        $b7->setPublisher("IDKnow");
        //
        $b8 = new Book();
        $b8->setName("Set Club");
        $b8->setClub($c3);
        $b8->setAuthor("S. Password");
        $b8->setPublisher("Set Email");
        //
        $b9 = new Book();
        $b9->setName("Yesterday is Today");
        $b9->setClub($c3);
        $b9->setAuthor("F. Kanter");
        $b9->setPublisher("316");

        //COMMENT.
        $cm1 = new Comment();
        $cm1->setUser($u1);
        $cm1->setBook($b4);
        $cm1->setCommenttext("Good book, loved it.");
        //
        $cm2 = new Comment();
        $cm2->setUser($u2);
        $cm2->setBook($b7);
        $cm2->setCommenttext("Burn it before it's too late.");
        //
        $cm3 = new Comment();
        $cm3->setUser($u6);
        $cm3->setBook($b2);
        $cm3->setCommenttext("Who wrote this again?");
        //
        $cm4 = new Comment();
        $cm4->setUser($u5);
        $cm4->setBook($b1);
        $cm4->setCommenttext("This book cleansed me.");
        //
        $cm5 = new Comment();
        $cm5->setUser($u9);
        $cm5->setBook($b9);
        $cm5->setCommenttext("Overall acceptable.");
        //
        $cm6 = new Comment();
        $cm6->setUser($u7);
        $cm6->setBook($b5);
        $cm6->setCommenttext("Pretty nice.");
        //
        $cm7 = new Comment();
        $cm7->setUser($u8);
        $cm7->setBook($b2);
        $cm7->setCommenttext("Worth the time.");
        //
        $cm8 = new Comment();
        $cm8->setUser($u3);
        $cm8->setBook($b6);
        $cm8->setCommenttext("Will definitely re-read it.");
        //
        $cm9 = new Comment();
        $cm9->setUser($u4);
        $cm9->setBook($b8);
        $cm9->setCommenttext("Very good book, will promote it to other people.");

        //Add to DB queue
        $manager->persist($c1);
        $manager->persist($c2);
        $manager->persist($c3);

        $manager->persist($mainAdmin);

        $manager->persist($rumiStaff);
        $manager->persist($setantaStaff);
        $manager->persist($serenureStaff);

        $manager->persist($u1);
        $manager->persist($u2);
        $manager->persist($u3);
        $manager->persist($u4);
        $manager->persist($u5);
        $manager->persist($u6);
        $manager->persist($u7);
        $manager->persist($u8);
        $manager->persist($u9);

        $manager->persist($b1);
        $manager->persist($b2);
        $manager->persist($b3);
        $manager->persist($b4);
        $manager->persist($b5);
        $manager->persist($b6);
        $manager->persist($b7);
        $manager->persist($b8);
        $manager->persist($b9);

        $manager->persist($cm1);
        $manager->persist($cm2);
        $manager->persist($cm3);
        $manager->persist($cm4);
        $manager->persist($cm5);
        $manager->persist($cm6);
        $manager->persist($cm7);
        $manager->persist($cm8);
        $manager->persist($cm9);

        // send query to DB
        $manager->flush();
    }

}
