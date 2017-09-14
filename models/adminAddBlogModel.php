<?php
if ($_SESSION['name'] != 'admin'){ echo "You do not have permissions to view this page";}

$errors = array();
$err_author = '';
$err_title = '';
$err_category_id = '';
$successful_txt = '';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['do_save'])){

    if(empty($_FILES['file']['size']))  die('You did not select a file');
    if($_FILES['file']['size'] > (2 * 1024 * 1024)) die('The file size should not exceed 2Mb');
    $imageinfo = getimagesize($_FILES['file']['tmp_name']);
    $arr = array('image/jpeg','image/gif','image/png');
    if(!in_array($imageinfo['mime'],$arr)) echo ('The picture must be a format JPG, GIF or PNG');
    else {
        $upload_dir = '../saves/images/';
        $image = $upload_dir.date('YmdHis').basename($_FILES['file']['name']);
        $mov = move_uploaded_file($_FILES['file']['tmp_name'],$image);
        if($mov) {
            $image = stripslashes(strip_tags(trim($image)));
        }
        else echo 'An error occurred while loading the photo. Please try again';
    }
    if (empty($_POST["author"])) {
        $errors[] = $err_author = "Please enter author!";
    }
    if (empty($_POST["title"])) {
        $errors[] = $err_title = "Please enter title!";
    }
    if (empty($_POST["category_id"])) {
        $errors[] = $err_category_id = "Please input one category!";
    }

    $author = $_POST["author"];
    $title = $_POST["title"];
    $preview = $_POST["preview"];
    $text = $_POST["text"];
    $category_id = $_POST["category_id"];

    if(empty($errors)){
//        mysqli_query($connect, "INSERT INTO `article` (`author`, `title`, `preview`,`image`, `text`, `category_id`, `date`) VALUES ('$author', '$title', '$preview', '$image', '$text', '$category_id', NOW())");
        unset($_POST['preview'], $_POST['text']);
        mysqli_query($connect, "INSERT INTO `article` (`author`, `title`, `preview`,`image`, `text`, `category_id`, `date`) VALUES ('".mysqli_real_escape_string($connect,$author)."', '".mysqli_real_escape_string($connect, $title)."', '".mysqli_real_escape_string($connect, $preview)."', '".mysqli_real_escape_string($connect, $image)."', '".mysqli_real_escape_string($connect,$text)."', '".mysqli_real_escape_string($connect,$category_id)."', NOW())");
        $successful_txt = 'You are add blog successful. If you want change blog press <a href="../pages/admin_all_blogs.php">here</a>';
    };
}
?>