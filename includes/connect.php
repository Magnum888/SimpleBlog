<?php
$connect = mysqli_connect('localhost','root','','sq');
if ( !$connect ){
    echo mysqli_connect_error();
    exit();
}
