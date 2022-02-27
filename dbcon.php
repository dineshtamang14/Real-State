<?php 
$server = 'localhost';
$user = 'root';
$password = '';
$db = 'test';

$con = mysqli_connect($server, $user, $password, $db);

if(!$con){
    echo "Connection Error: ".mysqli_connect_error();
}
?>