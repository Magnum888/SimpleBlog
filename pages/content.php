<?php
include 'safemysql.class.php';
include ('/includes/db.php');

$query = mysqli_query($connect, "SELECT * FROM `article` ORDER BY `id` DESC ");

$db = new safeMysql();
$row=mysqli_fetch_row($query);
$total_rows=$row[0];
$per_page = 10;
$cur_page = 1;
if (isset($_GET['page']) && $_GET['page'] > 0)
{
    $cur_page = $_GET['page'];
}
$start = ($cur_page - 1) * $per_page;

$sql  = "SELECT SQL_CALC_FOUND_ROWS * FROM `article` LIMIT ?i, ?i";
$data = $db->getAll($sql, $start, $per_page);
$row = $db->getOne("SELECT FOUND_ROWS()");
$num_pages = ceil($row / $per_page);
$page = 0;
?>
<?php
$categories_q = mysqli_query($connect, "SELECT * FROM `articles_categories`" );
$categories = array();
while ($cat = mysqli_fetch_assoc($categories_q))
{
    $categories[] = $cat;
}
?>
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="row main-categories">
                <?php
                    foreach ($categories as $cat)
                    {
                        ?>
                        <div class="col-md-4">
                            <a href="/category.php?id=<?php echo $cat['id']; ?>"><h3><?php echo $cat['title']; ?></h3></a>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <p class="last-blogs">Last blogs</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="row new-article">
                <?php
                $articles = mysqli_query($connect, "SELECT * FROM `article`" );
                ?>
                <?php
                while ($art = mysqli_fetch_assoc($articles))
                {
                    ?>
                    <div class="col-md-4 article" style="background: url('/saves/images/<?php echo $art['image']; ?>');background-repeat: no-repeat;background-position: center; background-color: #c4d7ff; border: 1px solid #8a2be2;">
                        <a href="/article.php?id=<?php echo $art['id']; ?>"><h3 class="title-article"><?php echo $art['title']; ?></h3></a>
                        <div>
                            <span class="author-article"><?php echo $art['author']; ?></span>
                            <span class="date-article"><?php echo $art['date'] = date('Y-m-d'); ?></span>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php
            $art_cat = false;
            foreach ($categories as $cat)
            {
                if($cat['id'] == $art['category_id'])
                {
                    $art_cat = $cat;
                    break;
                }
            }
            ?>
            <? foreach ($data as $row): ?>
                <div class="post-preview">
                    <a href="/article.php?id=<?php echo $row['id']; ?>">
                        <h2 class="post-title">
                            <?=$row['title']?>
                        </h2>
                        <small>
                            <a href="/category.php?id=<?php echo $art_cat['id']; ?>">Category:<?php echo $art_cat['title']; ?></a>
                        </small>
                        <h3 class="post-subtitle">
                            <?php echo mb_substr($row['text'], 0, 100, 'utf-8'); ?>
                        </h3>
                    </a>
                    <p class="post-meta">Posted by
                        <a href="#"><?=$row['author']?></a>
                        <?=$row['date']?></p>
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