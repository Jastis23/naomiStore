<div id="wrap">
<?
require('views/header.php');
require('../Models/ViewGetToolsModel.php');?>
	<aside>
		<form action="save_category.php" method="GET">
			<table>
				<tr>
					<td><label>Название категории</label></td>
					<td><input type="text" name="category"/></td>

				</tr>
				<tr>
					<td><label>id категории</label></td>
					<td><input type="text" name="id_category"/></td>
				</tr>
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
				<td><?=$item['name']?></td>
			</tr>    
		<?}?>
		</table>
	</content>
</div>	
<?require('views/footer.php');?>
