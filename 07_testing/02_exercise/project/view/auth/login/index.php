<title>Login</title>
<h2>Login</h2>
<form method="POST">
    Email:<input type="text" name="email" value="<?php echo isset($_POST['email'])?$_POST['email']:''?>" ><br>
    Password:<input type="password" name="password"><br>
    <input type="submit" value="Enter">
</form>

