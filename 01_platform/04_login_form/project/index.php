<?php
if(isset($_POST['submit']))
{
  $user=$_POST['user'];
  $password=$_POST['password'];
  if($user==""||$password=="") echo "EMPTY";
  else if($user=="foo"&&$password=="foo123") echo "OK";
  else echo "ERROR";
}

?>
<!DOCTYPE HTML>
<html>
<?php
if(!isset($_POST['submit'])) {
    echo '<form action="" method="post">
        User: <input type="text" name="user"/><br/>
        Password: <input type="password" name="password"/><br/>
        <input type="submit" value="Login" name="submit"/>
    </form>';
}
?>
</html>
