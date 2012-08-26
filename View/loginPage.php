<?php
ControllerAuth::pageAuth();
require_once(dirname(__DIR__) . '/Config/InitPHP.php');
require_once(dirname(__DIR__) . '/Config/InitHTML.php');
?>
<html>
    <head>
        <title></title>
    </head>

    <body>
        Hej <?php echo $_SESSION['username']; ?>, du er nu logget ind.<br></br>
        Din logontid er: <?php echo $_SESSION['logOnDT']; ?><br></br>
        Log ud <a href="Helper/Logout">Log ud</a><br></br>
        
        <?php
            if(ControllerAuth::pageAuth()){
                require('Admin/adminPanel.php');
            }
        ?>
    </body>
</html>