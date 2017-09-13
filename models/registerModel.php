<?php
$err_registr = array();
$err_txt = '';
$err_login = '';
$err_password = '';
$successful_txt = '';
if($_POST['do_register']){
    $login = htmlspecialchars(trim($_POST['login']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = md5(htmlspecialchars(trim($_POST['password'])));
    $password2 = md5(htmlspecialchars(trim($_POST['password2'])));

    $row = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' OR `email` = '$email'");
    if (!preg_match("/^[a-z0-9_-]{5,20}$/",$login)){
        $err_registr[] = $err_login = "The login can consist of letters, numbers, hyphens and underscores. The length is from 5 to 20 characters";
    };
    if (!preg_match("/^.{4,20}/", $password)){
        $err_registr[] = $err_password = "Password length is from 4 to 20 characters";
    };
    if(mysqli_num_rows($row)) $err_registr[] = $err_txt = "Do not use this login or email";
    if ($password != $password2) $err_registr[] = $err_password2 = "Passwords do not match";
    if(empty($err_registr)){
        $subject = "Registration on " . $config['title'];
        $message = $login . ", you are have registered on" . $config['title'];
        mail($email, $subject, $message);
//      mysqli_query($connect, "INSERT INTO `users` (`login`, `email`, `password`) VALUES ('".mysqli_real_escape_string($connect,$login)."', '".mysqli_real_escape_string($connect,$email)."', '".mysqli_real_escape_string($connect,$password)."')");
        mysqli_query($connect, "INSERT INTO `users` (`login`, `email`, `password`) VALUES ('$login', '$email', '$password')");
        $successful_txt = 'You are registered. Please sign in<a href="auth.php">here</a>';
    };
}
?>