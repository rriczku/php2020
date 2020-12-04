<div>
    <div>
        <!-- TODO: ... -->
    </div>
    <hr>
    <a href="/home">Home</a>
    <a href="/demo">Demo</a>
    <a href="/about">About</a>
    <a href="/users">Users</a>
    <?php
        if(!isset($_SESSION['logged'])) {
            echo "<a href = '/auth/login' > Login</a >";
            echo "<a href = '/auth/register' > Register</a >";
        } else {
            $name=$_SESSION['logged'];
            echo "<a href='/auth/logout'>Logout</a>";
            echo "<h3 class='user'>$name User</h3>";
        }
        ?>
</div>