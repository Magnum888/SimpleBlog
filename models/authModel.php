<?php
if(isset($_POST['login']) and isset($_POST['password'])){
    $login = htmlspecialchars(trim($_POST['login']));
    $password = md5(htmlspecialchars(trim($_POST['password'])));
    $query = mysqli_query($connect,"SELECT `login`, `password` FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
    $result = mysqli_fetch_assoc($query);
    if($result){
        $userProfile= mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
        $profile = mysqli_fetch_assoc($userProfile);
        $_SESSION['name'] = $login;
        $_SESSION['email'] = $profile['email'];
        $_SESSION['id'] = $profile['id'];
        $_SESSION['ban'] = $profile['ban'];
    }else{
        $error_password = "Incorrect login or password!!!";
    }
} ?>
