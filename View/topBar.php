<?php
require_once(dirname(__DIR__) . '/Config/InitPHP.php');
require_once(dirname(__DIR__) . '/Config/InitHTML.php');
?>
<html>
    <script>
        $(document).ready(function() {
            $('#topBarMenuLoginBut').click(
            function(){
                $('.loginForm').show();
                $('#loginUsername').focus();
            });
            $('.loginForm').mouseup(function() {
                return false
            });
            $(document).mouseup(
            function(e){
                $('.loginForm').hide();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#myform").validate({
                rules: {
                    username: "required",
                    password: "required"
                },
                messages: {
                    username: "Please enter your firstname",
                    password: "Please enter your lastname"
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
    </script>

    <body>
        <div class="loginForm">
            <div class="loginContent">
                <form action="Helper/CheckLogin.php" method="post" id="myform">
                    <div>Brugernavn:</div>
                    <div><input type="text" name="username" id="loginUsername"/></div>
                    <div>Kodeord:</div>
                    <div><input type="password" name="password" id="loginPassword" /></div>
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