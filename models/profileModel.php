<?php
$absentComment = "<div>Do`t have comments</div>";
$userProfile= mysqli_query($connect, "SELECT * FROM `users` ORDER BY `id` DESC ");
$profile = mysqli_fetch_assoc($userProfile);
$userComments = mysqli_query($connect, "SELECT * FROM `comments` WHERE `articles_id` = " . (int) $profile['id'] . " ORDER BY `id` DESC ");
$rowUserComments = mysqli_num_rows($userComments);
$userComment = mysqli_fetch_assoc($userComments);
?>