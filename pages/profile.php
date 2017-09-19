<?php require "../includes/config.php";?>
<?php include '../includes/db.php';?>
<?php include '../navigation.php' ?>
<?php include '../models/profileModel.php' ?>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('/img/about-me-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Profile</h1>
                        <span class="subheading">Personal page <?php echo $profile['login'];?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

<?php if (isset($_SESSION['name'])) {?>
<div>
    <figure class="snip1337">
        <img src="/img/bg-bigprofile.jpg" alt="sample" />
        <figcaption>
            <img src="/img/man.png" alt="profile" class="profile" />
            <h2><?php echo $profile['login'];?><span>User profile</span></h2>
            <p>Welcome to <?php echo $config['title'];?>. On the personal page you have the opportunity to view the data at registration and all the comments.</p>
            <?php if($_SESSION['name'] == 'admin') {?>
                <p>Go to the<a class="nav-link" href="/pages/admin.php">Admin page</a></p>
            <?php }?>
            <p><i class="fa fa-envelope-o" aria-hidden="true"></i><?php echo $profile['email'];?></p>
            <?php if($rowUserComments <= 0) {echo $absentComment;}
            while ($userComment) { ?>
                <div class="comments-article col-lg-12 col-md-12 mx-auto">
                    <button type="submit" class="btn btn-danger rounded">Delete comment</button>
                    <div>
                        <span>Comment written at:</span>
                        <span class="date-comment"><?php echo $userComment['pubdate']; ?></span>
                    </div>
                    <div class="text-comment">
                        <?php echo strip_tags($userComment['text']);?>
                    </div>
                </div>
                <hr>
            <?php } ?>
            <a href="#" class="follow">Follow</a>
            <a href="#" class="info">More Info</a>
        </figcaption>
    </figure>
</div>
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 mx-auto">

            </div>
        </div>
    </div>

<?php } ?>
<?php include 'footer.php'?>