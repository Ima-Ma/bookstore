<?php
include("connection.php");
$id = $_GET['id'];
$sql = "delete from category where id = $id";
$result = mysqli_query($conn , $sql);

echo"<script> 
alert('Role Has Been Deleted Successfully!');
window.location.href='category_show.php';
</script>";
?>