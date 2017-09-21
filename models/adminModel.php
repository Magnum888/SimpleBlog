<?php
$login = $_SESSION['name'];
$add = 1;
$admin_data = mysqli_query($connect,"SELECT `login`, `admin` FROM `users` WHERE `login` = '$login' AND `admin` = '$add'");
$admin_blog = mysqli_fetch_assoc($admin_data);
