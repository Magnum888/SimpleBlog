<?php
$query = mysqli_query($connect, "SELECT * FROM `article` ORDER BY `id` DESC ");
$db = new safeMysql();
$row=mysqli_fetch_row($query);
$total_rows=$row[0];
$per_page = 10;
$cur_page = 1;
if (isset($_GET['page']) && $_GET['page'] > 0) {$cur_page = $_GET['page'];}
$start = ($cur_page - 1) * $per_page;
$sql  = "SELECT SQL_CALC_FOUND_ROWS * FROM `article` LIMIT ?i, ?i";
$data = $db->getAll($sql, $start, $per_page);
$row = $db->getOne("SELECT FOUND_ROWS()");
$num_pages = ceil($row / $per_page);
$page = 0;

$categories_q = mysqli_query($connect, "SELECT * FROM `articles_categories`");
$categories = array();
while ($cat = mysqli_fetch_assoc($categories_q))
{
    $categories[] = $cat;
}

$articles_q = mysqli_query($connect, "SELECT * FROM `article` ORDER BY `views` DESC LIMIT 5" );
$articles = array();
while ($art = mysqli_fetch_assoc($articles_q))
{
    $articles[] = $art;
}

?>