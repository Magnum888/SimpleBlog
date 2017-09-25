<?php
$allUsers= mysqli_query($connect, "SELECT * FROM `users` ORDER BY `id` DESC ");
$user_id = (int)$_SESSION['id'];
if(isset($_POST['delete_user'])){
    $delete = (int) $_GET['id'];
    mysqli_query($connect, "DELETE FROM `users` WHERE `id` = '$delete'");
    $change_user_success = 'User DELETE successful, reload the page to reflect changes';
}
if(isset($_POST['ban_user'])){
    $ban = (int) $_GET['id'];
    if ($_POST['ban'] == 0){
        $change_user_success = 'User UNBLOCK successful, reload the page to reflect changes';
    }else{
        $change_user_success = 'User BAN successful, reload the page to reflect changes';
    }
    mysqli_query($connect, "UPDATE  `users` SET  `ban` =  '$_POST[ban]' WHERE `id` = '$ban'");

}
?>