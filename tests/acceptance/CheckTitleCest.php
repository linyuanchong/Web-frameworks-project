<?php
use \Codeception\Util\HttpCode;
use \App\Tests\AcceptanceTester;

class CheckTitleCest
{
    public function checkTitleHomePage(AcceptanceTester $I)
    {
        $url = '/';
        $I->amOnPage($url);
        $I->see('Dublin Book Clubs Online: DUBCO');
    }

    public function checkTitleClubPage(AcceptanceTester $I)
    {
        $url = '/club';
        $I->amOnPage($url);
        $I->see('Clubs');
    }

    public function checkTitleUserPage(AcceptanceTester $I)
    {
        $url = '/users';
        $I->amOnPage($url);
        $I->see('Members');
    }

    public function checkTitleBookPage(AcceptanceTester $I)
    {
        $url = '/book';
        $I->amOnPage($url);
        $I->see('Books');
    }

    public function checkTitleApplicationPage(AcceptanceTester $I)
    {
        $url = '/application';
        $I->amOnPage($url);
        $I->see('Applications');
    }

    public function checkTitleReplyPage(AcceptanceTester $I)
    {
        $url = '/reply';
        $I->amOnPage($url);
        $I->see('Application statuses');
    }

    public function checkTitleCommentPage(AcceptanceTester $I)
    {
        $url = '/comment';
        $I->amOnPage($url);
        $I->see('Comments');
    }

    public function checkTitleSuggestionPage(AcceptanceTester $I)
    {
        $url = '/suggestion';
        $I->amOnPage($url);
        $I->see('Suggest a book');
    }


}
