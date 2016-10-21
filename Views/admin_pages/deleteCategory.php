<?php
$id = $_GET['id_cat'];
?>
<h3><i class="fa fa-angle-right"></i> Удаление</h3>
<div class="col-lg-6 col-md-6 col-sm-12">
    <! -- ALERTS EXAMPLES -->
    <div class="showback">
        <h4><i class="fa fa-angle-right"></i> Нажмите на категорию для удаления</h4> 
        <?php
        $dbcon = ViewGetTools::connect();
        $order = new ViewGetTools();
        foreach ($order->GetLinks() as $item) {
            ?> 	
            <div class="alert alert-warning"><a href="admin.php?view=DeleteCatMethod&id_cat=<?= $item['category_id'] ?>"><?= $item['name'] ?></a></div>   	
        <?}?>
    </div><!-- /showback -->
</div>
