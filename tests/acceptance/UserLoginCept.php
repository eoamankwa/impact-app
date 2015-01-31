<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('I want to login into the app');
$I->amOnPage('/user');
$I->see('All Users', 'h1');
$I->see('eoamankwa');

$I = new AcceptanceTester($scenario);
$I->wantTo('I want to create a user');
$I->amOnPage('/user/create');
$I->fillField('username', 'JohnDoe');
$I->fillField('password', '1234');
$I->fillField('email', 'jDoe@gmail.com');
$I->click('Create User');
$I->seeCurrentUrlEquals('/user');
