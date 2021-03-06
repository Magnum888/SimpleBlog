<div style="color:green; font-weight: 700; margin-bottom: 10px;"><?php echo $delete_article_success;?></div>
<?php while ($art = mysqli_fetch_assoc($articles)) {?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 mx-auto">
                <div class="post-preview">
                    <form action="admin.php?id=<?php echo htmlspecialchars($art['id'])?>" method="POST">
                        <button type="submit" name="delete_article" class="btn btn-danger rounded">Delete article</button>
                    </form>
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
                    <div class="col-md-4 col-xs-12">
                        <img src="<?php echo $art['image']; ?>" class="img-fluid" alt="Responsive image">
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
<?php } ?>
                        