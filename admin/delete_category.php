<div id="wrap">
<?
require('views/header.php');
require('../Models/ViewGetToolsModel.php');

$id=$_GET['id_cat'];
?>
	<aside>
		<a href="index.php">На главную<a/>
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
				<td><a href="delete_save_category.php?id_cat=<?=$item['category_id']?>"><?=$item['name']?></a></td>
			</tr>    
		<?}?>
		</table>
	</content>
</div>	
<?require('views/footer.php');?>
