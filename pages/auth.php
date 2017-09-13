<?php include '../includes/db.php'; ?>
<?php require "../includes/config.php";?>
<?php include '../navigation.php' ?>
<?php include '../models/confirmAuthModel.php' ?>

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
<?php if (isset($_SESSION['name'])){ $login_user = $_SESSION['name'];?>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h4>Hello <?php echo $login_user; ?></h4>
                <p>Go to the<a href="/"> Main page </a>
                <p>Go to the<a href="profile.php"> Profile page </a>
            </div>
        </div>
    </div>

<?php }else {?>

    <div class="login">
        <div class = "container">
            <div class="wrapper">
                <div class="sign-name">Sign in</div>
                <form action="auth.php" method="post" name="Login_Form" class="form-signin">
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
                    <p><?php echo $error_password ?></p>
                    <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Enter" type="Submit">Enter</button>
                </form>
            </div>
        </div>
    </div>

    <?php }?>
<?php include 'footer.php'?>
