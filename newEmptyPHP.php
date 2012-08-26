
<html>
    <script src='js/jquery-1.8.0.min.js' type='text/javascript'></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $("#myform").validate({
        }
    </script>
    <body>
        <div class="loginForm">
            <div class="loginContent">
                <form action="Helper/CheckLogin.php" method="post" id="myform">
                    <div>Brugernavn:</div>
                    <div><input type="text" name="loginUsername" id="loginUsername" class="required" minlength="2" /></div>
                    <div>Kodeord:</div>
                    <div><input type="password" name="loginPassword" id="loginPassword" class="required" /></div>
                    <div><input type="submit" name="submit" value="Log ind" id="loginButton" /></div>
                </form>
            </div>
        </div>
        <div class="topBarSeparater"></div>
        <div class="topBarUserInfo">
            <div>
                <?php
                if (ControllerAuth::isAuth()) {
                    echo 'Logget ind som ' . $_SESSION['username'];
                } else {
                    echo 'Guest';
                }
                ?>
            </div>
        </div>
        <div class="topBarMenu">
            <?php
            if (!ControllerAuth::isAuth()) {
                echo "<a><div id='topBarMenuLoginBut'>Log ind</div></a>";
            } else {
                echo "<a href='Helper/Logout'><div id='topBarMenuLogoutBut'>Log ud</div></a>";
            }
            ?>
        </div>
    </body>
</html>