<?php include('../includes/db.php');?>
<?php require "../includes/config.php";?>
<?php include '../navigation.php' ?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('/img/header-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1><?php echo $config['title'];?></h1>
                    <span class="subheading">A Blog by Kovel for SoftGroup</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Page Content -->
<div class="login">
    <div class = "container">
        <div class="wrapper">
            <div class="sign-name">Sign in</div>
            <form action="cofirmauth.php" method="post" name="Login_Form" class="form-signin">
<!--                --><?php
//                if($_POST['Submit']){
//                    $_POST['password'] = md5($_POST['password']);
//                    $row = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$_POST[login]' AND `password` = '$_POST[password]'");
//                    if(mysqli_num_rows($row)) {
//                        $ass = mysqli_fetch_assoc($row);
//                        foreach ($ass as $key => $value){
//                            setcookie($key, $value, time()+7200);
//                        }
//                        echo 'id ='.$_COOKIE['id'];
//                        echo 'login ='.$_COOKIE['login'];
//                        echo 'password ='.$_COOKIE['password'];
//                        echo 'admin ='.$_COOKIE['id'];
//                    }
//                    else echo '<b>Login or password entered incorrectly</b>';
//                }
//                ?>
                <div class="row text-center bol"><i class="fa fa-circle"></i></div>
                <p class="form-signin-heading text-center">Enter neme and password</p>
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
