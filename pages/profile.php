<?php require "../includes/config.php";?>
<?php include '../includes/db.php';?>
<?php include '../navigation.php' ?>
<?php include '../models/profileModel.php' ?>

<?php if (isset($_SESSION['name'])) {?>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('/img/bg-headprofile.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Profile</h1>
                        <span class="subheading">Personal page <?php echo $_SESSION['name'];?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div>
        <figure class="snip1337">
            <img src="/img/bg-bigprofile.jpg" alt="sample" />
            <figcaption>
                <img src="/img/man.png" alt="profile" class="profile" />
                <h2><?php echo $_SESSION['name'];?><span>User profile</span></h2>
                <p>Welcome to <?php echo $config['title'];?>. On the personal page you have the opportunity to view the data at registration and all the comments.</p>
                <?php if($_SESSION['name'] == 'admin001') {?>
                    <p>Go to the<a class="nav-link" href="/pages/admin.php">Admin page</a></p>
                <?php }?>
                <p><i class="fa fa-envelope-o" aria-hidden="true"></i><?php echo $_SESSION['email'];?></p>
                <div class="col-lg-12 col-md-12 mx-auto">
                    <p class="title-comments">Comments:</p>
                    <hr>
                </div>
                <div style="color:green; font-weight: 700; margin-bottom: 10px;"><?php echo $delete_success;?></div>

                <?php if($rowUserComments <= 0) {echo $absentComment;}
                while ($userComment = mysqli_fetch_assoc($userComments)) { ?>
                    <div class="comments-article col-lg-12 col-md-12 mx-auto">
                        <div>
                            <span>Comment written at:</span>
                            <span class="date-comment"><?php echo $userComment['pubdate']; ?></span>
                        </div>
                        <div class="text-comment">
                            <?php echo strip_tags($userComment['text']);?>
                        </div>
                        <form action="profile.php?id=<?php echo htmlspecialchars($userComment['id'])?>" method="POST">
                            <button type="submit" name="delete_comment" class="btn btn-danger rounded">Delete comment</button>
                        </form>
                    </div>
                    <hr>
                <?php } ?>
<!--                <a href="#" class="follow">Follow</a>-->
<!--                <a href="#" class="info">More Info</a>-->
            </figcaption>
        </figure>
    </div>
<?php }else{ ?>
    <header class="masthead" style="background-image: url('/img/bg-headprofile.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Profile</h1>
                        <p class="subheading">You are not authorized to view this page</p>
                        <p class="subheading-error">Please <a href="auth.php">log in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php } ?>
<?php include 'footer.php'?>