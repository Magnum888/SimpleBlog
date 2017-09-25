<?php
$articles = mysqli_query($connect, "SELECT * FROM `article`");
if(isset($_POST['delete_article'])){
    $delete = (int) $_GET['id'];
    mysqli_query($connect, "DELETE FROM `article` WHERE `id` = '$delete'");
    $delete_article_success = 'Article delete successful, reload the page to reflect changes';
}
?>