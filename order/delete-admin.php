<?php
include('../config/constants.php');


$id= $_GET['id'];

$sql= "DELETE FROM tbl_admin WHERE id=$id";
$rec= mysqli_query($connect, $sql);

if($rec==true)
 {
     $_SESSION['delete']="<div class='success'>Admin deleted.</div>";
     header("location:".SITEURL.'/manage-admin.php');
 }
else
 {
     $_SESSION['delete']="<div class='error'>Admin is not deleted</div>" ;
     header("location:".SITEURL.'/manage-admin.php');
 }
?>