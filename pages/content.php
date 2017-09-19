<?php include '/includes/safemysql.class.php';?>
<?php include ('/models/contentModel.php');?>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="row main-categories" id="posts">
                <?php foreach ($categories as $cat)
                    {?>
                        <div class="col-md-4">
                            <a href="/category.php?id=<?php echo $cat['id']; ?>"><h3><?php echo $cat['title']; ?></h3></a>
                        </div>
                    <?php }?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 mx-auto">
            <p class="last-blogs">Last blogs</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10 col-md-10 mx-auto">
            <div class="row new-article">
                <div class="owl-carousel owl-theme">
                    <?php foreach ($articles as $art)
                    {
                        ?>
                            <div class="article item" style="background: url('<?php echo $art['image']; ?>');background-repeat: no-repeat;background-position: center; background-color: #c4d7ff; ">
                                <h4 class="title-article"><a href="../article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title']; ?></a></h4>
                                <div>
                                    <span class="author-article"><?php echo $art['author']; ?></span>
                                    <span class="date-article"><?php echo $art['date']; ?></span>
                                </div>
                            </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 mx-auto">
            <? foreach ($data as $row): ?>
                <div class="post-preview">
                    <a href="/article.php?id=<?php echo $row['id']; ?>">
                        <h2 class="post-title">
                            <?=$row['title']?>
                        </h2>
                        <h3 class="post-subtitle">
                            <?php echo mb_substr(strip_tags($row['text']), 0, 100, 'utf-8') . '...'; ?>
                        </h3>
                    </a>
                    <small>
                        <?php
                        $art_cat = false;
                        foreach ($categories as $category)
                        {
                            if($category['id'] == $row['category_id'])
                            {
                                $art_cat = $category;
                                break;
                            }
                        }
                        ?>
                        <span>Category:</span>
                        <a href="/category.php?id=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title']; ?></a>
                    </small>
                    <p class="post-meta">Posted by
                        <a href="#"><?=$row['author']?></a>
                        <?=$row['date']?>
                    </p>
                </div>
                <hr>
            <? endforeach ?>

            <!-- Pager -->
            <div class="clearfix">
                Pages:
                <? while ($page++ < $num_pages): ?>
                    <? if ($page == $cur_page): ?>
                        <b><?=$page?></b>
                    <? else: ?>
                        <a class="btn btn-secondary float-right" href="?page=<?=$page?>"><?=$page?>&rarr;</a>
                    <? endif ?>
                <? endwhile ?>
            </div>
        </div>
    </div>
</div>
<br>
<hr>
