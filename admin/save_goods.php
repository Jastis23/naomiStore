<?php 
include('../Models/ViewGetToolsModel.php');
$dbcon=ViewGetTools::connect();
$name=$_GET['name_cat'];
$id=$_GET['id_category'];
$title=$_GET['title'];
$discription=$_GET['discription'];
$price=$_GET['price'];
$image=$_GET['image'];
$res=$dbcon->prepare("INSERT INTO products(title,discription,price,image,category) VALUES('$title','$discription','$price','$image','$id')");
$res->execute();
echo"Добавлено<br>";
?>
<a href="index.php">На главную</a>