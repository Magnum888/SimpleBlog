<?php require "../includes/config.php";?>
<?php include '../includes/db.php';?>
<?php include '../navigation.php' ?>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('/img/about-me-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>About Me</h1>
                        <span class="subheading">This is what I do.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php
if (isset($_SESSION['name']))
{?>
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h4>Hello <?php echo $login_user; ?></h4>
                <p>Go to the<a href="/"> Main page </a>
                <p>Go to the<a href="exit.php"> Exit </a>
            </div>
        </div>
    </div>
<?php } ?>
<?php include 'footer.php'?>