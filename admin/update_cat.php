<div id="wrap">
<?
require('views/header.php');
require('../Models/ViewGetToolsModel.php');
$name=$_GET['name_cat'];
$id=$_GET['id_cat'];
?>
	<aside>
		<form action="admin.php" method="GET">
			<table>
				<tr>
					<td><label>Название категории</label></td>
					<td><input type="text" name="category" value="<?=$name?>"/></td>
				</tr>	
					<input type="hidden" hidden="true" name="id_category" value="<?=$id?>"/>		
			</table>
			<input type="submit" value="Создать"/>
		</form>
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
