<?php include('../includes/db.php');?>
<?php require "../includes/config.php";?>
<?php include '../navigation.php' ?>
<?php include '../models/registerModel.php' ?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('/img/register-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1><?php echo $config['title'];?></h1>
                    <span class="subheading">Register here</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="block-arrow">
    <div class="arrow arrow-1"></div>
    <div class="arrow arrow-2"></div>
</div>

<!-- Page Content -->
<div class='logup'>
    <form class="form-horizontal" action="register.php" method="post">
        <fieldset>

            <!-- Form Name -->
            <legend>Register</legend>
            <div class="text-center">

            <!-- Text input -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="login">Username</label>
                <div class="col-md-4 mx-auto">
                    <input class="form-control input-md" name="login" type="text" placeholder="Login" size="20" maxlength="20" required>
                </div>
                <div style="color:red; font-weight: 700; margin-bottom: 10px;"><?php echo $err_login;?></div>
            </div>

            <!-- Email input -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="email">Email</label>
                <div class="col-md-4 mx-auto">
                    <input class="form-control input-md" name="email" type="email" placeholder="Email" size="50" maxlength="50" required>
                </div>
            </div>

            <!-- Password input -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="password">Password</label>
                <div class="col-md-4 mx-auto">
                    <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" size="20" maxlength="20" required>
                </div>
            </div>

            <!-- Confirm Password input -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="password2">Confirm password</label>
                <div class="col-md-4 mx-auto">
                    <input id="password2" name="password2" type="password" placeholder="Re-type password" class="form-control input-md" size="20" maxlength="20" required>
                </div>
                <div style="color:red; font-weight: 700; margin-bottom: 10px;"><?php echo $err_password;?></div>
            </div>

            <!-- Error login -->
            <div style="color:red; font-weight: 700; margin-bottom: 10px;"><?php echo $err_txt;?></div>
            <h3 style="color:red; font-weight: 700; margin-bottom: 10px;"><?php echo $successful_txt;?></h3>

            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" ></label>
                <div class="col-md-8 mx-auto">
                    <button class="btn btn-default" name="do_register" type="submit" value="Enter">Enter</button>
                </div>
            </div>
            </div>
        </fieldset>
    </form>
</div>
<?php include 'footer.php'?>