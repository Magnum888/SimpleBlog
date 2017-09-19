<?php include '../includes/db.php';?>
<?php require "../includes/config.php";?>
<?php include '../navigation.php';?>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('/img/register-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1><?php echo $config['title'];?></h1>
                        <h3 class="subheading">Admin panel</h3>
                    </div>
                </div>
            </div>
        </div>
    </header>

<?php if ($_SESSION['name'] == 'admin'):?>
    <div class="container admin-page">
        <div class="row">
            <div class="col-12 col-lg-2">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action blueviolet active" id="list-addArticle-list" data-toggle="list" href="#list-addArticle" role="tab" aria-controls="addArticle">Add article</a>
                    <a class="list-group-item list-group-item-action blueviolet" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
                    <a class="list-group-item list-group-item-action blueviolet" id="list-users-list" data-toggle="list" href="#list-users" role="tab" aria-controls="users">Users</a>
                    <a class="list-group-item list-group-item-action blueviolet" id="list-comments-list" data-toggle="list" href="#list-comments" role="tab" aria-controls="comments">Comments</a>
                    <a class="list-group-item list-group-item-action blueviolet" id="list-deleteArticle-list" data-toggle="list" href="#list-deleteArticle" role="tab" aria-controls="deleteArticle">Delete article</a>
                </div>
            </div>
            <div class="col-12 col-lg-10">
                <div class="tab-content" id="nav-tabContent">

                    <!-- Content add article -->
                    <div class="tab-pane fade show active" id="list-addArticle" role="tabpanel" aria-labelledby="list-addArticle-list">
                        <?php include '../models/adminAddBlogModel.php';?>
                        <?php include 'adminAddArticle.php';?>
                    </div>
                    <!-- END Content add article -->

                    <!-- Content Profile -->
                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                        <?php include '../models/adminProfileModel.php';?>
                        <?php include 'adminProfile.php'?>
                    </div>
                    <!-- END Content Profile -->

                    <!--All Users. Delete users-->
                    <div class="tab-pane fade" id="list-users" role="tabpanel" aria-labelledby="list-users-list">
                        <?php include '../models/adminAllUsersModel.php';?>
                        <?php include 'adminAllUsers.php';?>
                    </div>
                    <!-- END All Users. Delete users-->

                    <!--All Comments. Delete comments-->
                    <div class="tab-pane fade" id="list-comments" role="tabpanel" aria-labelledby="list-comments-list">
                        <?php include '../models/adminCommentsModel.php';?>
                        <?php include 'adminComments.php';?>
                    </div>
                    <!-- END Comments. Delete comments-->

                    <!--All Article. Delete article-->
                    <div class="tab-pane fade" id="list-deleteArticle" role="tabpanel" aria-labelledby="list-deleteArticle-list">
                        <?php include '../models/adminArticleModel.php';?>
                        <?php include 'adminArticle.php';?>
                    </div>
                    <!-- END All Article. Delete article-->
                </div>
            </div>
        </div>
    </div>
<?php endif ?>
<?php include 'footer.php'?>

