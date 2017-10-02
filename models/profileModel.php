<?php
$absentComment = "<div>Do`t have comments</div>";
$user_id = (int)$_SESSION['id'];
//$userComments = mysqli_query($connect, "SELECT * FROM `comments` WHERE `articles_id` = '$id_user'" . " ORDER BY `id` DESC ");
//$userComments = mysqli_query($connect, "SELECT * FROM `comments` WHERE `user_id` = ". (int)$user_id);
$userComments = mysqli_query($connect, "SELECT * FROM `comments` WHERE `user_id` = '$user_id'". "ORDER BY `id` DESC");
$rowUserComments = mysqli_num_rows($userComments);
if(isset($_POST['delete_comment'])){
    $delete = (int) $_GET['id'];
    mysqli_query($connect, "DELETE FROM `comments` WHERE `id` = '$delete'");
    $delete_success = 'Comment delete successful, it will be removed soon';
}
if(isset($_POST['id'])){
    $delete = (int) $_POST['id'];
    mysqli_query($connect, "DELETE FROM `comments` WHERE `id` = '$delete'");
    $delete_success = 'Comment delete successful, it will be removed soon';
}
?>