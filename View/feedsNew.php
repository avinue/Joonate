<?php
require_once(dirname(__DIR__) . '/Config/InitPHP.php');
require_once(dirname(__DIR__) . '/Config/InitHTML.php');
?>
<html>
    <body>
        <?php
        $ctrFeeds = new ControllerFeeds();

        $result = $ctrFeeds->getFeeds();
        while ($row = mysql_fetch_array($result)) {
            {
                echo "<div class='newFeeds'>";
                echo "<div class='newFeedsContent'>";
                echo "<div id='feedTitle'><h1>" . $row['feedTitle'] . "</h1></div>";
                echo "<div id='feedAuthor'>" . $row['feedAuthor'] . "</div>";
                echo "<div id='feedInfo'>" . $row['feedInfo'] . "</div>";
                echo "</div></div>";
            }
        }
        ?>
    </body>
</html>
