<?php session_start()?>
<?php include('../includes/db.php');?>
<?php require "../includes/config.php";?>
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