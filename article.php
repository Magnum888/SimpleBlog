<?php require "includes/config.php";?>
<?php include 'includes/db.php';?>
<?php include 'pages/navigation.php' ?>

<?php
    $article = mysqli_query($connect, "SELECT * FROM `article` WHERE `id` = " . (int) $_GET['id']);
    if(mysqli_num_rows($article) <= 0)
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
            $art = mysqli_fetch_assoc($article);
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
                        <div class="col-lg-8 col-md-10 mx-auto">
                            <?php echo $art['text']; ?>
                        </div>
                    </div>
                </div>
            </article>

            <hr>
            <?php
        }
    ?>

<?php include 'pages/footer.php'?>
