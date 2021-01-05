<?php

$I = new AcceptanceTester($scenario ?? null);
$I->wantTo('see books coments from DB displayed on page');

$I->seeNumRecords(0, "comments");

$randomNumber = rand();

$title = "Title $randomNumber";
$text = "Some text $randomNumber with **bold** text";
$textOnPage = "Some text $randomNumber with bold text";
$bookid = 1;
$description = "sfafag";
$isbn = 1111111111111;
$tt = $I->haveInDatabase('books', ['title' => $title, 'description' => $description, 'isbn' => $isbn]);
$id = $I->haveInDatabase('comments', ['title' => $title, 'text' => $text, 'book_id' => $bookid]);

$I->amOnPage("/books/$tt");
$I->seeCurrentUrlEquals('/login');

$I->fillField('email', 'john.doe@gmail.com');
$I->fillField('password', 'secret');
$I->click('Login');

$I->click("Comments");
$I->seeCurrentUrlEquals("/books/$tt/comments");

$I->see($title, 'h2');
$I->see($text);

$I->click("Edit");
$I->seeCurrentUrlEquals("/books/$tt/comments/$id/edit");
$I->fillField('title', 'NewTitle');
$I->fillField('text', 'NewText');
$I->click('Update');
$I->seeCurrentUrlEquals("/comments/$id");
$I->seeInDatabase('comments',['title' => 'NewTitle', 'text' => 'NewText', 'book_id' => $bookid]);

$I->see("NewTitle",'h1');
$I->see("NewText",'p');

$I->amOnPage("/books/$tt");
$I->click("Comments");
$I->click("Delete");
$I->seeCurrentUrlEquals("/books/$tt/comments");
$I->dontSeeInDatabase('comments', [
    'title' => "NewTitle",
    'text' => "NewText",
    'book_id'=>$id
]);

$I->click("Create new...");

$I->seeCurrentUrlEquals("/books/$tt/comments/create");
$I->fillField('title', 'NewTitle');
$I->fillField('text', 'NewText');
$I->click('Create');
$I->seeCurrentUrlEquals("/comments/2");
$I->seeInDatabase('comments',['title' => 'NewTitle', 'text' => 'NewText', 'book_id' => $bookid]);

$I->see("NewTitle",'h1');
$I->see("NewText",'p');
