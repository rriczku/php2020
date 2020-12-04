<?php
    if(isset($_SESSION['goodtoken'])&&$_SESSION['goodtoken']==false) {
        echo "<li class='error'>Provided token is invalid!</li>";
        unset($_SESSION['goodtoken']);
    }
    if(isset($_SESSION['goodtoken'])&&$_SESSION['goodtoken']==true) {
        echo "<li class='info'>Email successfully confirmed!</li>";
        unset($_SESSION['goodtoken']);
    }
    if(isset($_SESSION['nomailfound'])) {
        $error=$_SESSION['nomailfound'];
        echo "<li class='error'>$error</li>";
        unset($_SESSION['nomailfound']);
    }
    if(isset($_SESSION['incorectpassword'])) {
        echo "<li class='error'>Password is invalid!</li>";
        unset($_SESSION['incorectpassword']);
    }
    if(isset($_SESSION['logged'])) {
         $user=$_SESSION['logged'];
        echo "<h4>Welcome back $user!</h4>";
        //unset($_SESSION['logged']);
    }
    if(isset($_SESSION['logout']))
    {
        echo "<h3>Logged out successfully!</h3>";
        unset($_SESSION['logout']);
    }
?>