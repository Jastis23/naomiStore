<?php 
include('../Models/ViewGetToolsModel.php');
$dbcon=ViewGetTools::connect();
$id=$_GET['id'];
$res=$dbcon->exec("DELETE FROM products WHERE id='$id'");
echo"Добавлено<br>";
?>
<a href="index.php">На главную</a>