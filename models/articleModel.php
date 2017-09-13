<?php
$articles = mysqli_query($connect, "SELECT * FROM `article` WHERE `id` = " . (int) $_GET['id']);
$art = mysqli_fetch_assoc($articles);
mysqli_query($connect, "UPDATE `article` SET `views` = `views` + 1 WHERE `id` = " . (int) $art['id']);
$comments= mysqli_query($connect, "SELECT * FROM `comments` WHERE `articles_id` = " . (int) $art['id'] . " ORDER BY `id` DESC ");
$nameErr = $nicknameErr = $emailErr = $messageErr = $comment_success = "";
$form_key = 'comment_to_article';
$csrf_token = '';
$user_id = 2;
$errors = array();
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(version_compare(PHP_VERSION,'7.0.0', '>='))
{
    $csrf_token =  bin2hex(random_bytes(32));
}else
{
    if (function_exists('mcrypt_create_iv')) {
        $csrf_token = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
    } else {
        $csrf_token = bin2hex(openssl_random_pseudo_bytes(32));
    }
}
$_SESSION['csrf_' . $form_key] = $csrf_token;

//        print_r($_POST['csrf'] . '<br>');
//        print_r($_SESSION['csrf_' . $form_key]);
//        exit();

//                if (!empty($_POST['csrf'])) {
//        if (hash_equals($_SESSION['csrf' . $form_key], $_POST['csrf'])) {
//            // Proceed to process the form data
//
//
//        } else {
//            // Log this as a warning and keep an eye on these attempts
//            exit("Warning!!! CSRF!!!");
//        }
//                }

//                  TODO Finish token

if (isset($_POST['do_post']))
{
    if (empty($_POST["name"])) {
        $errors[] = $nameErr = "Please enter name!";
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["nickname"])) {
        $errors[] = $nicknameErr = "Please enter nickname!";
    } else {
        $nickname = test_input($_POST["nickname"]);
    }

    if (empty($_POST["email"])) {
        $errors[] = $emailErr = "Please enter email!";
    } else {
        $email = test_input($_POST["email"]);
    }

    if (empty($_POST["message"])) {
        $errors[] = $messageErr = "Please enter comment!";
    } else {
        $message = test_input($_POST["message"]);
    }
    if (empty($errors))
    {
        mysqli_query($connect, "INSERT INTO `comments` (`author`, `nickname`, `email`, `text`, `pubdate`, `articles_id`) VALUES ('".mysqli_real_escape_string($connect,$_POST['name'])."', '".mysqli_real_escape_string($connect,$_POST['nickname'])."', '".mysqli_real_escape_string($connect,$_POST['email'])."', '".mysqli_real_escape_string($connect,$_POST['message'])."', NOW(), '".$art['id']."')" );
        $comment_success = 'Comment add successful!!!';
        unset($_POST['name'], $_POST['nickname'], $_POST['email'], $_POST['message']);
//                                            $url = 'article.php?id=' . $art['id'];
//                                            header('Location:  /');
    }
}
?>