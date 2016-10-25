<div id="wrap">
    
<?php
include('views/header.php');
require('../Models/ViewGetToolsModel.php');
echo "<h1>Заказы</h1>";
$dbcon=ViewGetTools::connect();
$order=new ViewGetTools();
echo "<table>";
foreach ($order->AllOrders() as $item)
{   
    echo "<tr>          
            <td>".$item['product']."</td>
          
            <td>".$item['price']."</td>
          
            <td>".$item['qty']."</td>
                
            <td>".$item['name']."</td>
            
            <td>".$item['second_name']."</td>
            
            <td>".$item['adress']."</td>
                
            <td>".$item['email']."</td>
                
            <td>".$item['date']."</td>
         </tr>";
    
}
 echo "<table>";
?>
</div>
	
