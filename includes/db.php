<?php require_once "config.php";
$connect = mysqli_connect(
    $config['db']['server'],
    $config['db']['username'],
    $config['db']['password'],
    $config['db']['name']
);
if ( $connect == false){
    echo 'Do not enter database!!!<br>';
    echo mysqli_connect_error();
    exit();
}?>
