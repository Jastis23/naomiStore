<div id="wrap">
<?
require('views/header.php');
require('../Models/ViewGetToolsModel.php');
$category=$_GET['id_cat'];
$id=$_GET['id'];
$title=$_GET['title'];
$discription=$_GET['discription'];
$price=$_GET['price'];
$image=$_GET['image'];
?>
	<aside>
	<table>
		
		<?php
		echo "<h2>".$_GET['name_cat']."</h2>";
		$dbcon=ViewGetTools::connect();
		$order=new ViewGetTools();
		foreach ($order->Category($category) as $item)
		{  
		?> 
			<tr>          
				<td><a href="delete_save_prod.php?id=<?=$item['id']?>&id_cat=<?=$item['category']?>&title=<?=$item['title']?>&discription=<?=$item['discription']?>
				&price=<?=$item['price']?>&image=<?=$item['image']?>"><?=$item['title']?></a></td>
			</tr>    
		<?}?>
	</table>
		<a href="index.php">Назад</a>
	</aside>
	<content>
		<table>   
			<?php
		$dbcon=ViewGetTools::connect();
		$order=new ViewGetTools();
		foreach ($order->GetLinks() as $item)
		{  
		?> 
			<tr>          
				<td><a href="?id_cat=<?=$item['category_id']?>&name_cat=<?=$item['name']?>"><?=$item['name']?></a></td>
			</tr>    
		<?}?>
		</table>
	</content>
</div>	
<?require('views/footer.php');?>
