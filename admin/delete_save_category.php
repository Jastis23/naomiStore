<?php 
include('../Models/ViewGetToolsModel.php');
$dbcon=ViewGetTools::connect();
$category=$_GET['id_cat'];
$res=$dbcon->exec("DELETE FROM categories WHERE category_id='$category'");
echo"Добавлено<br>";
?>
<a href="index.php">На главную</a>