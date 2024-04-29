<?php
include("connection.php");
$id = $_GET['id'];
$sql = "delete from authors where id = $id";
$result = mysqli_query($conn , $sql);

echo"<script> 
alert('Author Has Been Deleted Successfully!');
window.location.href='author_show.php';
</script>";
?>