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
                    <?php while ($comment = mysqli_fetch_assoc($comments))
                    {
                        ?>
                        <div class="comments-article col-lg-12 col-md-12 mx-auto">
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

            <hr>
            <?php
        }
    ?>

<?php include 'pages/footer.php'?>
