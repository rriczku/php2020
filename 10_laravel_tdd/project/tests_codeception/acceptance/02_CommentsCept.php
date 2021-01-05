<?php
$I = new AcceptanceTester($scenario ?? null);
$I->wantTo('see comments from DB displayed on page');

$I->seeNumRecords(0, "comments");

$randomNumber = rand();

$title = "Title $randomNumber";
$text = "Some text $randomNumber with **bold** text";
$textOnPage = "Some text $randomNumber with bold text";
$bookid=1;
$description="sfafag";
$isbn=1111111111111;
$tt=$I->haveInDatabase('books',['title'=>$title,'description'=>$description,'isbn'=>$isbn]);
$id = $I->haveInDatabase('comments', ['title' => $title, 'text' => $text,'book_id'=>$bookid]);

$I->amOnPage('/comments');
$I->seeLink($title, "/comments/$id");

$I->click($title);
$I->seeCurrentUrlEquals("/comments/$id");

$I->see($title, 'h1');
$I->see($textOnPage, 'p');

$I->see("bold", 'p > strong');
