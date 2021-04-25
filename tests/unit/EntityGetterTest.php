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
    //TEST CLUB toString().
    public function testClubToString()
    {
        $newClub = new Club('clubName', 10);
        $newClub->setMemberCount(10);
        $expectedResult = 10;
        $result = $newClub->getMemberCount();
        $this->assertEquals($expectedResult, $result);
    }

    //TEST USER toString().
    public function testUserToString()
    {
        $newClub = new Club('clubName', 12);
        $newUser = new User('user@email.com', 'userPassword', 'USER_ROLE', 'userName', $newClub);
        $result = $newUser->toString();
        $this->assertIsString($result);
    }

    //TEST BOOK toString().
    public function testBookToString()
    {
        $newClub = new Club('clubName', 12);
        $newBook = new Book("bookName", "bookAuthor", "bookPublisher", $newClub);
        $result = $newBook->toString();
        $this->assertIsString($result);
    }

    //TEST APPLICATION toString().
    public function testApplicationToString()
    {
        $newClub = new Club('clubName', 12);
        $newApplication = new Application('userName', 'user@email.com', 'userPassword', 'John', $newClub);
        $result = $newApplication->toString();
        $this->assertIsString($result);
    }

    //TEST REPLY toString().
    public function testReplyToString()
    {
        $newClub = new Club('clubName', 12);
        $newApplication = new Application('userName', 'user@email.com', 'userPassword', 'John', $newClub);
        $newReply = new Reply($newApplication, TRUE, $newClub);
        $result = $newReply->toString();
        $this->assertIsString($result);
    }

    //TEST COMMENT toString().
    public function testCommentToString()
    {
        $newClub = new Club('clubName', 12);
        $newUser = new User('user@email.com', 'userPassword', 'USER_ROLE', 'userName', $newClub);
        $newBook = new Book("bookName", "bookAuthor", "bookPublisher", $newClub);
        $newComment = new Comment($newUser, $newBook, 'commentText');
        $result = $newComment->toString();
        $this->assertIsString($result);
    }

    //TEST SUGGESTION toString().
    public function testSuggestionToString()
    {
        $newClub = new Club('clubName', 12);
        $newSuggestion = new Suggestion($newClub, 'bookTitle', 'bookAuthor', 'bookPublisher');
        $result = $newSuggestion->toString();
        $this->assertIsString($result);
    }

}
