<?php
include 'safemysql.class.php';

$query = mysqli_query($connect, "SELECT * FROM `article` ORDER BY `id` DESC ");
//$row = mysqli_num_rows($query);
//if(!$row) echo 'not found article';
//else {
//    while ($art = mysqli_fetch_assoc($query)){?>
<!--        <article>-->
<!--            <p>author: --><?//=$art['author']?><!--</p>-->
<!--            <p>title: --><?//=$art['title']?><!--</p>-->
<!--            <p>text: --><?//=$art['text']?><!--</p>-->
<!--            <p>date: --><?//=$art['date']?><!--</p>-->
<!--        </article>-->
<!--    --><?//}
//}

$db = new safeMysql();
$row=mysqli_fetch_row($query);
$total_rows=$row[0];
$per_page = 1;
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

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <? foreach ($data as $row): ?>
                <div class="post-preview">
                    <a href="/post.php">
                        <h2 class="post-title">
                            <?=$row['title']?>
                        </h2>
                        <h3 class="post-subtitle">
                            <?=$row['text']?>
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
<!--                <a class="btn btn-secondary float-right" href="#">Older Posts &rarr;</a>-->
            </div>
        </div>
    </div>
</div>
<br>

<hr>