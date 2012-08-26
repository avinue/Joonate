<?php
require_once(dirname(__DIR__) . '/Joonate/Config/InitPHP.php');
?>
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01//EN' 'http://www.w3.org/TR/html4/strict.dtd'>
<html>
    <head>
        <?php
            require_once(dirname(__DIR__) . '/Joonate/Config/InitHTML.php');
        ?>
        <title></title>
    </head>
    <body>
        <div class="all">
            <div class="topBar">
                <div class="topBarMiddel">
                    <?php require('View/topBar.php'); ?>
                </div>

            </div>
            <div class="backgroundTop"></div>
            <div class="contentBorder">
                <div class="content">
                    <div class="contentTop"></div>
                    <div class="contentMiddle">
                        <?php
                        if (($_SERVER['QUERY_STRING'] != NULL)) {
                            require('View/' . $_SERVER['QUERY_STRING'] . '.php');
                        }
                        else
                            require('View/home.php');
                        ?>
                    </div>
                    <div class="contentBottom"></div>
                </div>
            </div>
            <div class="backgroundBottom"></div>
        </div>
    </body>
</html>