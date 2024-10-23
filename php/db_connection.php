<?php
$servername="localhost";
$username="root";
$password="Suraj@1234";
$database="bca";

$connection=mysqli_connect($servername,$username,$password,$database);
if(!$connection){
    die("Connection doesn't Establish...");
}
?>