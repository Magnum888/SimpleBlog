<?php
$comments= mysqli_query($connect, "SELECT * FROM `comments` ORDER BY `id` DESC ");
if(isset($_POST['delete_comment'])){
    $delete = (int) $_GET['id'];
    mysqli_query($connect, "DELETE FROM `comments` WHERE `id` = '$delete'");
    $delete_success = 'Comment delete successful';
}
?>