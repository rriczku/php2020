<?php
$uri=$_SERVER['REQUEST_URI'];

$parts = explode('/', $_SERVER['REQUEST_URI']);

array_shift($parts);

$page=$parts[0].".php";
if($page!='home.php'&&$page!='about.php'&&$page!='menu.php'&&$page!='user.php'&&$page!='users.php'&&$page!=".php")
    $page="404.php";
$_GET['id']=$parts[1];
//echo $page;


include "../views/layout.php";
?>