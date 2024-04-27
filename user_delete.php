<?php
include("connection.php");

$id =$_GET['id'];
$sql = "delete from users where id = $id";
$result = mysqli_query($conn , $sql);

echo"<script> 
alert('User Has Been Deleted Successfully!');
window.location.href='user_show.php';
</script>";


?>