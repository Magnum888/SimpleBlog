<?php include 'header.php'?>
<?php include ('../includes/connect.php');?>
<div class="login">
    <div class = "container">
        <div class="wrapper">
            <div class="sign-name">Sign in</div>
            <form action="auth.php" method="post" name="Login_Form" class="form-signin">
                <?php
                if($_POST['Submit']){
                    $_POST['password'] = md5($_POST['password']);
                    $row = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$_POST[login]' AND `password` = '$_POST[password]'");
                    if(mysqli_num_rows($row)) {
                        $ass = mysqli_fetch_assoc($row);
                        foreach ($ass as $key => $value){
                            setcookie($key, $value, time()+7200);
                        }
                        echo 'id ='.$_COOKIE['id'];
                        echo 'login ='.$_COOKIE['login'];
                        echo 'password ='.$_COOKIE['password'];
                        echo 'admin ='.$_COOKIE['id'];
                    }
                    else echo '<b>Login or password entered incorrectly</b>';
                }
                ?>
                <div class="row text-center bol"><i class="fa fa-circle"></i></div>
                <h3 class="form-signin-heading text-center">
                    <img src="http://codigocomcafe.com.br/demo/form/image/logo.png" alt=""/>
                </h3>
                <hr class="spartan">
                <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon1">
                            <i class="fa fa-user"></i>
                        </span>
                    <input type="text" class="form-control" name="login" placeholder="Username" required="" autofocus="" />
                </div>
                <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon1">
                            <i class="fa fa-lock"></i>
                        </span>
                    <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
                </div>
                <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Enter" type="Submit">Enter</button>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php'?>
