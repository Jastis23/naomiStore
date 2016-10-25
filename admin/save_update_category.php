<?
require('../Models/ViewGetToolsModel.php');
$name=$_GET['category'];
$id=$_GET['id_category'];
$dbcon=ViewGetTools::connect();
$res=$dbcon->exec("UPDATE categories SET name='$name' WHERE category_id='$id'");
?>