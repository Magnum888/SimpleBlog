<?php include 'header.php'?>
<div class='logup'>
    <form class="form-horizontal" action="register.php" method="post">
        <fieldset>
            <?php
            if($_POST['do_register']){
                $row = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$_POST[login]'");
                if(mysqli_num_rows($row)) echo '<h3>Do not use this login</h3>';
                else if($_POST['login'] != '' AND $_POST['password'] != '' AND $_POST['password'] == $_POST['password2']){
                    $_POST['password'] = md5($_POST['password']);
                    mysqli_query($connect, "INSERT INTO `users` (`login`, `password`) VALUES ('$_POST[login]', '$_POST[password]')");
                    echo '<h3>You are sign in</h3>';
                }else echo "Error";
            }
            ?>
            <!-- Form Name -->
            <legend>Register</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="login">Username</label>
                <div class="col-md-4">
                    <input class="form-control input-md" name="login" type="text" placeholder="Login">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="password">Password</label>
                <div class="col-md-4">
                    <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md">
                    <!--                            required=""-->
                </div>
            </div>

            <!-- Password input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="password2">Confirm password</label>
                <div class="col-md-4">
                    <input id="password2" name="password2" type="password" placeholder="Re-type password" class="form-control input-md">

                </div>
            </div>

            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" ></label>
                <div class="col-md-8">
                    <input class="btn btn-default" name="do_register" type="submit" value="Enter"></input>
                </div>
            </div>

        </fieldset>
    </form>
</div>
<?php include 'footer.php'?>