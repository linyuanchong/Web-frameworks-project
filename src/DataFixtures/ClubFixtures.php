<?php

namespace App\DataFixtures;

use App\Entity\Book;
use App\Entity\Club;
use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class ClubFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //CLUBS.
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

        //USERS.
        $u1 = new User();
        $u1->setClub($c1);
        $u1->setName("John");
        $u1->setRole("ROLE_USER");
        $u1->setPassword("john");
        $u1->setEmail("john@email.com");
        //
        $u2 = new User();
        $u2->setClub($c1);
        $u2->setName("Amanda");
        $u2->setRole("ROLE_USER");
        $u2->setPassword("amanda");
        $u2->setEmail("amanda@email.com");
        //
        $u3 = new User();
        $u3->setClub($c1);
        $u3->setName("Donovan");
        $u3->setRole("ROLE_USER");
        $u3->setPassword("donovan");
        $u3->setEmail("donovan@email.com");
        //
        $u4 = new User();
        $u4->setClub($c2);
        $u4->setName("Linyuan");
        $u4->setRole("ROLE_USER");
        $u4->setPassword("linyuan");
        $u4->setEmail("linyuan@email.com");
        //
        $u5 = new User();
        $u5->setClub($c2);
        $u5->setName("Josephine");
        $u5->setRole("ROLE_USER");
        $u5->setPassword("josephine");
        $u5->setEmail("josephine@email.com");
        //
        $u6 = new User();
        $u6->setClub($c2);
        $u6->setName("Calvin");
        $u6->setRole("ROLE_USER");
        $u6->setPassword("calvin");
        $u6->setEmail("calvin@email.com");
        //
        $u7 = new User();
        $u7->setClub($c3);
        $u7->setName("Gordon");
        $u7->setRole("ROLE_USER");
        $u7->setPassword("gordon");
        $u7->setEmail("gordon@email.com");
        //
        $u8 = new User();
        $u8->setClub($c3);
        $u8->setName("Aaron");
        $u8->setRole("ROLE_USER");
        $u8->setPassword("aaron");
        $u8->setEmail("aaron@email.com");
        //
        $u9 = new User();
        $u9->setClub($c3);
        $u9->setName("Parker");
        $u9->setRole("ROLE_USER");
        $u9->setPassword("parker");
        $u9->setEmail("parker@email.com");

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

        $manager->persist($c1);
        $manager->persist($c2);
        $manager->persist($c3);

        $manager->persist($b1);
        $manager->persist($b2);
        $manager->persist($b3);
        $manager->persist($b4);
        $manager->persist($b5);
        $manager->persist($b6);
        $manager->persist($b7);
        $manager->persist($b8);
        $manager->persist($b9);

        $manager->persist($u1);
        $manager->persist($u2);
        $manager->persist($u3);
        $manager->persist($u4);
        $manager->persist($u5);
        $manager->persist($u6);
        $manager->persist($u7);
        $manager->persist($u8);
        $manager->persist($u9);

        $manager->persist($cm1);
        $manager->persist($cm2);
        $manager->persist($cm3);
        $manager->persist($cm4);
        $manager->persist($cm5);
        $manager->persist($cm6);
        $manager->persist($cm7);
        $manager->persist($cm8);
        $manager->persist($cm9);

        $manager->flush();
    }
}
