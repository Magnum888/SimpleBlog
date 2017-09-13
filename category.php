<?php include'includes/db.php';?>
<?php require "includes/config.php";?>
<?php include 'navigation.php' ?>
<?php include 'models/categoryModel.php'?>

<?php if(mysqli_num_rows($categories) <= 0) {?>

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

<?php }else {?>

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

    <!-- Post Content -->
<?php while ($art = mysqli_fetch_assoc($articles)) {?>

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
                    <div style="background: url('<?php echo $art['image']; ?>');background-repeat: no-repeat;background-position: center; height: 250px;">
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
<?php } ?>
    <hr>
<?php } ?>
<?php include 'pages/footer.php'?>
