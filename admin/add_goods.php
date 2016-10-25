<div id="wrap">
<?
require('views/header.php');
require('../Models/ViewGetToolsModel.php');
$name=$_GET['name_cat'];
$id=$_GET['id_cat'];
?>
	<aside>
		<form action="save_goods.php" method="GET">
			<table>
				<tr>
					<td><label>Название товара</label></td>
					<td><input type="text" name="title"/></td>
				</tr>
				<tr>
					<td><label>Описание</label></td>
					<td><textarea type="text" name="discription"></textarea></td>
				</tr>
				<tr>
					<td><label>Цена</label></td>
					<td><input type="text" name="price"/></td>
				</tr>
				<tr>
					<td><label>Картинка</label></td>
					<td><input type="text" name="image"/></td>
				</tr>
			</table>
				<input type="hidden" name="category" value="<?=$name?>"/>
				<input type="hidden" name="id_category" value="<?=$id?>"/>
			<input type="submit" value="Создать"/>
		</form>
		<a href="index.php">Назад</a>
	</aside>
	<content>
		<table>   
		<?php
		$dbcon=ViewGetTools::connect();
		$order=new ViewGetTools();
		foreach ($order->GetLinks() as $item){  
		?> 
			<tr>          
				<td><a href="?id_cat=<?=$item['category_id']?>&name_cat=<?=$item['name']?>"><?=$item['name']?></a></td>
			</tr>
		<?}?>
		</table>
		<?
		
		
		?>
	</content>
</div>	
<?require('views/footer.php');?>
