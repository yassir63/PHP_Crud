<?php
include('connect.php');
$id=$_REQUEST['ID_eleve'];
$sql = "DELETE FROM eleves WHERE ID_eleve=$id";
$result1 = mysqli_query($conn, $sql);
header("Location: all_members_admin.php"); 
?>