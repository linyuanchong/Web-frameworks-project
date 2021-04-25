<?php

use PHPUnit\Framework\TestCase;
use \App\Entity\Club;
use \App\Entity\User;
use \App\Entity\Book;
use \App\Entity\Application;
use \App\Entity\Reply;
use \App\Entity\Comment;
use \App\Entity\Suggestion;


class EntityGetterTest extends TestCase
{
    //TEST CLUB GETTERS.
    public function testClubGetters()
    {
        $newClub = new Club('clubName', 10);

        $result1 = $newClub->getName();
        $result2 = $newClub->getMemberCount();

        $expectedResult1 = 'clubName';
        $expectedResult2 = 10;

        $this->assertEquals($expectedResult1, $result1);
        $this->assertEquals($expectedResult2, $result2);
    }

    //TEST USER GETTERS.
    public function testUserGetters()
    {
        $newClub = new Club('clubName', 12);
        $newUser = new User('user@email.com', 'userPassword', 'USER_ROLE', 'userName', $newClub);

        $result1 = $newUser->getEmail();
        $result2 = $newUser->getPassword();
        $result3 = $newUser->getRole();
        $result4 = $newUser->getName();
        $result5 = $newUser->getClub();

        $expectedResult1 = 'user@email.com';
        $expectedResult2 = 'userPassword';
        $expectedResult3 = 'USER_ROLE';
        $expectedResult4 = 'userName';
        $expectedResult5 = $newClub;

        $this->assertEquals($expectedResult1, $result1);
        $this->assertEquals($expectedResult2, $result2);
        $this->assertEquals($expectedResult3, $result3);
        $this->assertEquals($expectedResult4, $result4);
        $this->assertEquals($expectedResult5, $result5);
    }

    //TEST BOOK GETTERS.
    public function testBookGetters()
    {
        $newClub = new Club('clubName', 12);
        $newBook = new Book("bookName", "bookAuthor", "bookPublisher", $newClub);

        $result1 = $newBook->getName();
        $result2 = $newBook->getAuthor();
        $result3 = $newBook->getPublisher();
        $result4 = $newBook->getClub();

        $expectedResult1 = 'bookName';
        $expectedResult2 = 'bookAuthor';
        $expectedResult3 = 'bookPublisher';
        $expectedResult4 = $newClub;

        $this->assertEquals($expectedResult1, $result1);
        $this->assertEquals($expectedResult2, $result2);
        $this->assertEquals($expectedResult3, $result3);
        $this->assertEquals($expectedResult4, $result4);
    }

    //TEST APPLICATION GETTERS.
    public function testApplicationGetters()
    {
        $newClub = new Club('clubName', 12);
        $newApplication = new Application('userName', 'user@email.com', 'userPassword', $newClub);

        $result1 = $newApplication->getName();
        $result2 = $newApplication->getEmail();
        $result3 = $newApplication->getPassword();
        $result4 = $newApplication->getClub();

        $expectedResult1 = 'userName';
        $expectedResult2 = 'user@email.com';
        $expectedResult3 = 'userPassword';
        $expectedResult4 = $newClub;

        $this->assertEquals($expectedResult1, $result1);
        $this->assertEquals($expectedResult2, $result2);
        $this->assertEquals($expectedResult3, $result3);
        $this->assertEquals($expectedResult4, $result4);
    }

    //TEST REPLY GETTERS.
    public function testReplyGetters()
    {
        $newClub = new Club('clubName', 12);
        $newApplication = new Application('userName', 'user@email.com', 'userPassword', 'John', $newClub);
        $newReply = new Reply($newApplication, TRUE, 'replyReason');

        $result1 = $newReply->getApplication();
        $result2 = $newReply->getAcceptance();
        $result3 = $newReply->getReason();

        $expectedResult1 = $newApplication;
        $expectedResult2 = TRUE;
        $expectedResult3 = 'replyReason';

        $this->assertEquals($expectedResult1, $result1);
        $this->assertEquals($expectedResult2, $result2);
        $this->assertEquals($expectedResult3, $result3);
    }

    //TEST COMMENT GETTERS.
    public function testCommentGetters()
    {
        $newClub = new Club('clubName', 12);
        $newUser = new User('user@email.com', 'userPassword', 'USER_ROLE', 'userName', $newClub);
        $newBook = new Book("bookName", "bookAuthor", "bookPublisher", $newClub);
        $newComment = new Comment($newUser, $newBook, 'commentText');

        $result1 = $newComment->getUser();
        $result2 = $newComment->getBook();
        $result3 = $newComment->getCommenttext();

        $expectedResult1 = $newUser;
        $expectedResult2 = $newBook;
        $expectedResult3 = 'commentText';

        $this->assertEquals($expectedResult1, $result1);
        $this->assertEquals($expectedResult2, $result2);
        $this->assertEquals($expectedResult3, $result3);
    }

    //TEST SUGGESTION GETTERS.
    public function testSuggestionGetters()
    {
        $newClub = new Club('clubName', 12);
        $newSuggestion = new Suggestion($newClub, 'bookTitle', 'bookAuthor', 'bookPublisher');

        $result1 = $newSuggestion->getClub();
        $result2 = $newSuggestion->getBooktitle();
        $result3 = $newSuggestion->getAuthor();
        $result4 = $newSuggestion->getPublisher();

        $expectedResult1 = $newClub;
        $expectedResult2 = 'bookTitle';
        $expectedResult3 = 'bookAuthor';
        $expectedResult4 = 'bookPublisher';

        $this->assertEquals($expectedResult1, $result1);
        $this->assertEquals($expectedResult2, $result2);
        $this->assertEquals($expectedResult3, $result3);
        $this->assertEquals($expectedResult4, $result4);
    }

}
