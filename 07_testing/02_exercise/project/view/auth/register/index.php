<h2>Register</h2>
<form method="POST">
    ID:<input type="text" name="id" value="<?php echo isset($_POST['id'])?$_POST['id']:''?>"><br>
    Name:<input type="text" name="name" value="<?php echo isset($_POST['name'])?$_POST['name']:''?>""><br>
    Surname:<input type="text" name="surname" value="<?php echo isset($_POST['surname'])?$_POST['surname']:''?>"><br>
    Email:<input type="text" name="email" value="<?php echo isset($_POST['email'])?$_POST['email']:''?>"><br>
    Password:<input type="password" name="password"><br>
    Password Confirm:<input type="password" name="password_confirmation"><br>
    <input type="submit" value="Create">
</form>
