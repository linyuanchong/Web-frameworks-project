<?php
use \Codeception\Util\HttpCode;
use \App\Tests\AcceptanceTester;

class URLWorkingCest
{
    public function canVisitHomePage(AcceptanceTester $I)
    {
        $url = '/';
        $I->amOnPage($url);
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->dontSeeResponseCodeIs(HttpCode::NOT_FOUND);
    }

    public function canVisitClubPage(AcceptanceTester $I)
    {
        $url = '/club';
        $I->amOnPage($url);
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->dontSeeResponseCodeIs(HttpCode::NOT_FOUND);
    }

    public function canVisitUserPage(AcceptanceTester $I)
    {
        $url = '/users';
        $I->amOnPage($url);
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->dontSeeResponseCodeIs(HttpCode::NOT_FOUND);
    }

    public function canVisitBookPage(AcceptanceTester $I)
    {
        $url = '/book';
        $I->amOnPage($url);
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->dontSeeResponseCodeIs(HttpCode::NOT_FOUND);
    }

    public function canVisitApplicationPage(AcceptanceTester $I)
    {
        $url = '/application';
        $I->amOnPage($url);
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->dontSeeResponseCodeIs(HttpCode::NOT_FOUND);
    }
    public function canVisitReplyPage(AcceptanceTester $I)
    {
        $url = '/reply';
        $I->amOnPage($url);
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->dontSeeResponseCodeIs(HttpCode::NOT_FOUND);
    }

    public function canVisitCommentPage(AcceptanceTester $I)
    {
        $url = '/comment';
        $I->amOnPage($url);
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->dontSeeResponseCodeIs(HttpCode::NOT_FOUND);
    }

    public function canVisitSuggestionPage(AcceptanceTester $I)
    {
        $url = '/suggestion';
        $I->amOnPage($url);
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->dontSeeResponseCodeIs(HttpCode::NOT_FOUND);
    }


}
