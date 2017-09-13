<?php include'includes/db.php';?>
<?php require "includes/config.php";?>
<?php include 'navigation.php' ?>


<?php
$categories = mysqli_query($connect, "SELECT * FROM `articles_categories` WHERE `id` = " . (int) $_GET['id']);
if(mysqli_num_rows($categories) <= 0)
{
    ?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/one-article.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>Blog</h1>
                        <h2 class="subheading">Sorry this category not found </h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php
}else
{


    $cat = mysqli_fetch_assoc($categories);
    ?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/one-article.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1><?php echo $cat['title']?></h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php
    $articles = mysqli_query($connect, "SELECT * FROM `article` WHERE `category_id` = " . (int) $_GET['id']);
    ?>
<!--     Post Content -->
        <?php
            while ($art = mysqli_fetch_assoc($articles))
            {
        ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 mx-auto">
                <div class="post-preview">
                    <a href="/article.php?id=<?php echo $art['id']; ?>">
                        <h2 class="post-title">
                            <?=$art['title']?>
                        </h2>
                        <h3 class="post-subtitle">
                            <?php echo mb_substr(strip_tags($art['text']), 0, 100, 'utf-8') . '...'; ?>
                        </h3>
                    </a>
                    <p class="post-meta">Posted by
                        <a href="#"><?=$art['author']?></a>
                        <?=strip_tags($art['date']) ?>
                    </p>
                    <div style="background: url('<?php echo $art['image']; ?>');background-repeat: no-repeat;background-position: center; height: 250px;"></div>

                </div>
                <hr>
            </div>
        </div>
    </div>
         <?php } ?>
    <hr>
    <?php
}
?>
<?php include 'pages/footer.php'?>
