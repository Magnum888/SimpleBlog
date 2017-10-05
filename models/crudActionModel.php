<?php //session_start()?>
<?php //include('../includes/db.php');?>
<?php //require "../includes/config.php";?>
<?php
$action = $_GET["action"];
function open_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if(!empty($action)) {
    switch($action) {
        case "add":
            $articles = mysqli_query($connect, "SELECT * FROM `article` WHERE `id` = " . (int) $_GET['id']);
            $art = mysqli_fetch_assoc($articles);
            $name = $_SESSION["name"];
            $nickname = open_input($_GET["nickname"]);
            $email = $_SESSION["email"];
            $user_id = $_SESSION["id"];
            $message = open_input($_GET["message"]);
            var_dump($name, $art['id'], $nickname, $email, $user_id, $message);
            $result = mysqli_query($connect, "INSERT INTO `comments` (`author`, `nickname`, `email`, `text`, `pubdate`, `articles_id`, `user_id`) VALUES ('".mysqli_real_escape_string($connect, $name)."', '".mysqli_real_escape_string($connect, $nickname)."', '".mysqli_real_escape_string($connect, $email)."', '".mysqli_real_escape_string($connect, $message)."', NOW(), '".$art['id']."', '".$user_id."')" );
            if($result){
                $insert_id = mysqli_insert_id($connect);
                echo '<div class="comments-article show-art col-lg-12 col-md-12 mx-auto" id="comment_' . $insert_id . '">
                    <a class="add-comment-link btn btn-2" href="#form-comment">Add comment&#8595;</a>
                    <div>
                        <span>Comment by:</span>
                        <span class="author-comment">'.$name.'</span>
                        <span class="date-comment"></span>
                    </div>
                    <div class="text-comment">
                        ' . $message . '
                    </div>
                    <button class="btnEditAction" name="edit" onClick="showEditBox(this,' . $insert_id . ')">Edit</button>
                    <button class="btnDeleteAction" name="delete" onClick="callCrudAction(\'delete\',' . $insert_id . ')">Delete</button>
                </div>
                <hr>';
            }
            break;

        case "edit":
            $result = mysqli_query($connect,"UPDATE `comments` set text = '".$_POST["txtmessage"]."' WHERE  id=".(int) $_POST["comment_id"]);
            if($result){
                echo $_POST["txtmessage"];
            }
            break;

        case "delete":
            if(!empty($_POST["comment_id"])) {
                mysqli_query($connect,"DELETE FROM `comments` WHERE id=".(int) $_POST["comment_id"]);
            }
            break;
    }
}
?>