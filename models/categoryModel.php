<?php
$categories = mysqli_query($connect, "SELECT * FROM `articles_categories` WHERE `id` = " . (int) $_GET['id']);
$cat = mysqli_fetch_assoc($categories);
$articles = mysqli_query($connect, "SELECT * FROM `article` WHERE `category_id` = " . (int) $_GET['id']);
?>