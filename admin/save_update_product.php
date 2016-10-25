<?php 
include('../Models/ViewGetToolsModel.php');
$dbcon=ViewGetTools::connect();
$category=$_GET['category'];
echo $id=$_GET['id'];
$title=$_GET['title'];
$discription=$_GET['discription'];
echo $price=$_GET['price'];
$image=$_GET['image'];
$res=$dbcon->exec("UPDATE products SET title='$title',discription='$discription',price='$price',image='$image' WHERE id='$id'");
echo"Добавлено<br>";
?>
<a href="index.php">На главную</a>