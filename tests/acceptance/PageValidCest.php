<?php
use \Codeception\Util\HttpCode;
use \App\Tests\AcceptanceTester;

class PageValidCest
{
    public function validHomePage(AcceptanceTester $I)
    {
        $url = '/';
        $I->amOnPage($url);
    }

    public function validClubPage(AcceptanceTester $I)
    {
        $url = '/club';
        $I->amOnPage($url);
    }

    public function validUserPage(AcceptanceTester $I)
    {
        $url = '/users';
        $I->amOnPage($url);
    }

    public function validBookPage(AcceptanceTester $I)
    {
        $url = '/book';
        $I->amOnPage($url);
    }

    public function validApplicationPage(AcceptanceTester $I)
    {
        $url = '/application';
        $I->amOnPage($url);
    }
    public function validReplyPage(AcceptanceTester $I)
    {
        $url = '/reply';
        $I->amOnPage($url);
    }

    public function validCommentPage(AcceptanceTester $I)
    {
        $url = '/comment';
        $I->amOnPage($url);
    }

    public function validSuggestionPage(AcceptanceTester $I)
    {
        $url = '/suggestion';
        $I->amOnPage($url);
    }


}
