<?php include 'pages/header.php'?>
<?php
    if($_GET['page'] == 'auth'){?>
        <div class="login">
            <div class = "container">
                <div class="wrapper">
                    <div class="sign-name">Sign in</div>
                    <form action="" method="post" name="Login_Form" class="form-signin">
                        <div class="row text-center bol"><i class="fa fa-circle"></i></div>
                        <h3 class="form-signin-heading text-center">
                            <img src="http://codigocomcafe.com.br/demo/form/image/logo.png" alt=""/>
                        </h3>
                        <hr class="spartan">
                        <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon1">
                            <i class="fa fa-user"></i>
                        </span>
                            <input type="text" class="form-control" name="Username" placeholder="Username" required="" autofocus="" />
                        </div>
                        <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon1">
                            <i class="fa fa-lock"></i>
                        </span>
                            <input type="password" class="form-control" name="Password" placeholder="Password" required=""/>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Enter" type="Submit">Enter</button>
                    </form>
                </div>
            </div>
        </div>
    <?}
    else if ($_GET['page'] == 'register'){?>
        <div class='logup'>
            <form class="form-horizontal" action="/user.php?page=register" method="post">
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
                        <label class="col-md-4 control-label" >Register</label>
                        <div class="col-md-8">
                            <input id="do_register" class="btn btn-default" name="do_register" type="submit" value="Enter"></input>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>

    <?}

?>
<?php include 'pages/footer.php'?>
