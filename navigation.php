<?php session_start(); ?>
<?php include('includes/db.php');?>
<?php require "includes/config.php";?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="myBlog">
    <meta name="author" content="Kovel">
    <meta property="og:title" content="<?php echo $config['title'];?>">
    <meta property="og:site_name" content="<?php echo $config['title'];?>">
    <meta property="og:url" content="<?php echo $config['url'];?>">
    <meta property="og:description" content="<?php echo $config['description'];?>">
    <meta property="og:image" content="<?php echo $config['image'];?>">

    <title><?php echo $config['title'];?></title>

    <!-- Bootstrap -->
    <link href="/includes/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Carousel -->
    <link href="/css/owl.theme.default.min.css" rel="stylesheet" >
    <link href="/css/owl.carousel.min.css" rel="stylesheet" >

    <!-- Custom fonts -->
    <link href="/includes/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>

    <!-- Custom styles -->
    <link href="/css/style.css" rel="stylesheet">

</head>

<body style="background-image: url('/img/white-wood.jpg')">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/">Blog Kovel</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pages/about.php">About me</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#posts">Posts category</a>
                </li>
                <?php if (!isset($_SESSION['name']))
                {?>
                <li class="nav-item">
                    <a class="nav-link" href="/pages/register.php">Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pages/auth.php">Log in</a>
                </li>
                <?php }else{?>
                <li class="nav-item">
                    <a class="nav-link" href="/pages/profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pages/exit.php">Exit</a>
                </li>
                <?php }?>

                <?php if($_SESSION['name'] == 'admin001')
                    {?>
                        <li class="nav-item">
                            <a class="nav-link" href="/pages/admin.php">Admin</a>
                        </li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>