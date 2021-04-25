<?php

use PHPUnit\Framework\TestCase;
use \App\Entity\Club;
use \App\Entity\User;
use \App\Entity\Book;
use \App\Entity\Application;
use \App\Entity\Reply;
use \App\Entity\Comment;
use \App\Entity\Suggestion;


class EntityConstructorTest extends TestCase
{
    //TEST CLUB CONSTRUCTOR.
    public function testClubConstructor()
    {
        $newClub = new Club('clubName', 10);
        $this->assertNotNull($newClub);
    }

    //TEST USER CONSTRUCTOR.
    public function testUserConstructor()
    {
        $newClub = new Club('clubName', 12);
        $newUser = new User('user@email.com', 'userPassword', 'USER_ROLE', 'userName', $newClub);
        $this->assertNotNull($newUser);
    }

    //TEST BOOK CONSTRUCTOR.
    public function testBookConstructor()
    {
        $newClub = new Club('clubName', 12);
        $newBook = new Book("bookName", "bookAuthor", "bookPublisher", $newClub);
        $this->assertNotNull($newBook);
    }

    //TEST APPLICATION CONSTRUCTOR.
    public function testApplicationConstructor()
    {
        $newClub = new Club('clubName', 12);
        $newApplication = new Application('userName', 'user@email.com', 'userPassword', 'John', $newClub);
        $this->assertNotNull($newApplication);
    }

    //TEST REPLY CONSTRUCTOR.
    public function testReplyConstructor()
    {
        $newClub = new Club('clubName', 12);
        $newApplication = new Application('userName', 'user@email.com', 'userPassword', 'John', $newClub);
        $newReply = new Reply($newApplication, TRUE, $newClub);
        $this->assertNotNull($newReply);
    }

    //TEST COMMENT CONSTRUCTOR.
    public function testCommentConstructor()
    {
        $newClub = new Club('clubName', 12);
        $newUser = new User('user@email.com', 'userPassword', 'USER_ROLE', 'userName', $newClub);
        $newBook = new Book("bookName", "bookAuthor", "bookPublisher", $newClub);
        $newComment = new Comment($newUser, $newBook, 'commentText');
        $this->assertNotNull($newComment);
    }

    //TEST SUGGESTION CONSTRUCTOR.
    public function testSuggestionConstructor()
    {
        $newClub = new Club('clubName', 12);
        $newSuggestion = new Suggestion($newClub, 'bookTitle', 'bookAuthor', 'bookPublisher');
        $this->assertNotNull($newSuggestion);
    }

}
