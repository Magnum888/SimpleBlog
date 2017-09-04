<?php include'includes/db.php';?>
<?php require "includes/config.php";?>
<?php include 'pages/navigation.php'?>


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
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1><?php echo $art['title']?></h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <?php echo $art['text']; ?>
                </div>
            </div>
        </div>
    </article>
            <?php } ?>
    <hr>
    <?php
}
?>
<?php include 'pages/footer.php'?>
