<html lang="en">
<head>
    <title>Pretty URL</title>
    <link rel="stylesheet" type="text/css" href="../public/style.css"/>
</head>
<body>
<div>
    <?php
        include "menu.php";
    ?>
</div>
<?php include $page;
if($page==".php") echo "Welcome on homepage!";

?>
</body>
</html>