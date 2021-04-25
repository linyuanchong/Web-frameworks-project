<?php
use \Codeception\Util\HttpCode;
use \App\Tests\AcceptanceTester;

class CheckHeadingCest
{
    public function checkHeadingHomePage(AcceptanceTester $I)
    {
        $url = '/';
        $I->amOnPage($url);
        $I->see('Dublin Book Clubs Online: DUBCO');
        $I->see('Dublin Book Clubs Online: DUBCO', ['css' => 'body h1']);

    }

    public function checkHeadingClubPage(AcceptanceTester $I)
    {
        $url = '/club';
        $I->amOnPage($url);
        $I->see('Clubs');
        $I->see('Clubs', ['css' => 'body h1']);
    }

    public function checkHeadingUserPage(AcceptanceTester $I)
    {
        $url = '/users';
        $I->amOnPage($url);
        $I->see('Members');
        $I->see('Members', ['css' => 'body h1']);
    }

    public function checkHeadingBookPage(AcceptanceTester $I)
    {
        $url = '/book';
        $I->amOnPage($url);
        $I->see('Books');
        $I->see('Books', ['css' => 'body h1']);
    }

    public function checkHeadingApplicationPage(AcceptanceTester $I)
    {
        $url = '/application';
        $I->amOnPage($url);
        $I->see('Applications');
        $I->see('Applications', ['css' => 'body h1']);
    }

    public function checkHeadingReplyPage(AcceptanceTester $I)
    {
        $url = '/reply';
        $I->amOnPage($url);
        $I->see('Application statuses');
        $I->see('Application statuses', ['css' => 'body h1']);
    }

    public function checkHeadingCommentPage(AcceptanceTester $I)
    {
        $url = '/comment';
        $I->amOnPage($url);
        $I->see('Comments');
        $I->see('Comments', ['css' => 'body h1']);
    }

    public function checkHeadingSuggestionPage(AcceptanceTester $I)
    {
        $url = '/suggestion';
        $I->amOnPage($url);
        $I->see('Suggest a book');
        $I->see('Suggest a book', ['css' => 'body h1']);
    }


}
