<?php
$errors = array();
$err_author = '';
$err_title = '';
$err_category_id = '';
$successful_txt = '';
function test_input($data) {
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($_POST['do_save'])){
    if (empty($_POST["author"])) {
        $errors[] = $err_author = "Please enter author!";
    }
    if (empty($_POST["title"])) {
        $errors[] = $err_title = "Please enter title!";
    }
    if (empty($_POST["category_id"])) {
        $errors[] = $err_category_id = "Please input one category!";
    }

    $author = test_input($_POST["author"]);
    $title = test_input($_POST["title"]);
    $preview = test_input($_POST["preview"]);
    $text = test_input($_POST["text"]);
    $category_id = test_input($_POST["category_id"]);
    $image = 'null';

    if(empty($errors)){
        mysqli_query($connect, "INSERT INTO `article` (`author`, `title`, `preview`,`image`, `text`, `category_id`, `date`) VALUES ('$author', '$title', '$preview', '$image', '$text', '$category_id', NOW())");
//        mysqli_query($connect, "INSERT INTO `article` (`author`, `title`, `preview`, `text`, `category_id`, `date`) VALUES ('".mysqli_real_escape_string($connect,$author)."', '".mysqli_real_escape_string($connect, $title)."', '".mysqli_real_escape_string($connect, $preview)."', '".mysqli_real_escape_string($connect,$text)."', '".mysqli_real_escape_string($connect,$category_id)."', NOW())");
//        mysqli_query($connect, "INSERT INTO `users` (`login`, `email`, `password`) VALUES ('$login', '$email', '$password')");
        $successful_txt = 'You are add blog successful. If you want change blog press <a href="admin_all_blogs.php">here</a>';
    };
}
?>