<?php require "includes/config.php";?>
<?php include 'includes/db.php';?>
<?php include 'pages/navigation.php' ?>

<?php
    $articles = mysqli_query($connect, "SELECT * FROM `article` WHERE `id` = " . (int) $_GET['id']);
    if(mysqli_num_rows($articles) <= 0)
    {
?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/one-article.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>Blog</h1>
                        <h2 class="subheading">Sorry this article not found </h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php
    }else
        {
            $art = mysqli_fetch_assoc($articles);
            mysqli_query($connect, "UPDATE `article` SET `views` = `views` + 1 WHERE `id` = " . (int) $art['id']);
            ?>
            <!-- Page Header -->
            <header class="masthead" style="background-image: url('img/one-article.jpg')">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-10 mx-auto">
                            <div class="post-heading">
                                <h1><?php echo $art['title']?></h1>
                                <span class="meta">Posted by
                                    <a href=""><?php echo $art['author']; ?></a>
                                    on <?php echo $art['date']; ?>
                                </span>
                                <span>Views: <?php echo $art['views']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Post Content -->
            <article>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mx-auto">
                            <div class="post-preview">
                                <p class="post-preview-txt">
                                    <?=$art['preview']?>
                                </p>
                                <div class="img-article text-center">
                                    <img class="img-fluid" src="/saves/images/<?php echo $art['image']; ?>" alt="">
                                </div>
                                <div class="post-subtitle">
                                    <?php echo $art['text']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

<!--            Post comments-->
            <article>
                <?php
                $comments= mysqli_query($connect, "SELECT * FROM `comments` WHERE `articles_id` = " . (int) $art['id'] . " ORDER BY `id` DESC ");
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mx-auto">
                            <p class="title-comments">Comments:</p>
                            <hr>
                        </div>
                    </div>
                    <?php
                    if(mysqli_num_rows($comments) <= 0)
                    {
                        echo "Do`t have comments";
                    }
                    while ($comment = mysqli_fetch_assoc($comments))
                    {
                        ?>
                        <div class="comments-article col-lg-12 col-md-12 mx-auto">
                            <a class="add-comment-link btn btn-2" href="#form-comment">Add comment&#8595;</a>
                            <div>
                                <span>Comment by:</span>
                                <span class="author-comment"><?php echo $comment['author']; ?></span>
                                <span class="date-comment"><?php echo $comment['pubdate']; ?></span>
                            </div>
                            <div class="text-comment">
                                <?php echo strip_tags($comment['text']); ?>
                            </div>
                        </div>
                        <hr>
                        <?php
                    }
                    ?>
                </div>
            </article>
            <article id="form-comment">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 mx-auto">
                            <div class="panel panel-default">
                                <div class="panel-heading" >
                                    <h4 class="title-comments">Comment: </h4>
                                </div>
                                <form action="article.php?id=<?php echo $art['id']?>#form-comment" method="POST">
                                    <?php
                                    if (isset($_POST['do_post']))
                                    {
                                        $errors = array();
                                        if ($_POST['name'] == '')
                                        {
                                            $errors[] = "enter name";
                                        }
                                        if ($_POST['nickname'] == '')
                                        {
                                            $errors[] = "enter nickname";
                                        }
                                        if ($_POST['email'] == '')
                                        {
                                            $errors[] = "enter email";
                                        }
                                        if ($_POST['message'] == '')
                                        {
                                            $errors[] = "enter comment";
                                        }
                                        if (empty($errors))
                                        {
                                            //add comment
                                        }else
                                            {
                                                echo $errors[0];
                                            }
                                    }
                                    ?>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                                <input type="text" name="name" placeholder="Name" class="form-control" value="<?php echo $_POST['name']?>" autofocus="autofocus">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user-plus" aria-hidden="true"></i></span>
                                                <input type="text" name="nickname" placeholder="Nickname" class="form-control" value="<?php echo $_POST['nickname']?>" autofocus="autofocus">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                <input type="email" name="email" placeholder="Email" class="form-control" value="<?php echo $_POST['email']?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-comment"></i></span>
                                                <textarea name="message" rows="6" class="form-control" type="text" placeholder="Text comment"><?php echo $_POST['message']?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 mx-auto">
                                            <button type="submit" name="do_post" class="fill pull-right">Send <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                            <button type="reset" value="Reset" name="reset" class="fill">Reset <i class="fa fa-refresh" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </article>
            <hr>
            <?php
        }
    ?>

<?php include 'pages/footer.php'?>
