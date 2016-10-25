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
				<td><a href="?id=<?=$item['id']?>&id_cat=<?=$item['category']?>&title=<?=$item['title']?>&discription=<?=$item['discription']?>
				&price=<?=$item['price']?>&image=<?=$item['image']?>"><?=$item['title']?></a></td>
			</tr>    
		<?}?>
	</table>
	
	<?if($_GET['id'])
	{?>
		<form action="save_update_product.php" method="GET">
			<table>
				<tr>
					<td><label>Название продукта</label></td>
					<td><input type="text" name="title" value="<?=$title?>"/></td>
				</tr>
				<tr>
					<td><label>Описание</label></td>
					<td><input type="text" name="discription" value="<?=$discription?>"/></td>
				</tr>
				<tr>
					<td><label>Цена</label></td>
					<td><input type="text" name="price" value="<?=$price?>"/></td>
				</tr>
				<tr>
					<td><label>Картинка</label></td>
					<td><input type="text" name="image" value="<?=$image?>"/></td>
				</tr>
				<tr>
					<td><label>Категория</label></td>
					<td><input type="text" name="category" value="<?=$category?>"/></td>
				</tr>
					<input type="hidden" hidden="true" name="id" value="<?=$id?>"/>		
			</table>
			<input type="submit" value="Создать"/>
		</form>
	<?}?>
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
