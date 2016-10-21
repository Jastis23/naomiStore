<?php
$name = $_GET['name_cat'];
$id = $_GET['id_cat'];
?>
<h3><i class="fa fa-angle-right"></i> Редактирование</h3>
<div class="col-lg-6 col-md-6 col-sm-12">
    <! -- ALERTS EXAMPLES -->
    <div class="showback">
        <h4><i class="fa fa-angle-right"></i> Выберете категорию для редактирования</h4> 
        <?php
        $dbcon = ViewGetTools::connect();
        $order = new ViewGetTools();
        foreach ($order->GetLinks() as $item) {
            ?> 	
            <div class="alert alert-warning"><a href="admin.php?view=updateCategory&id_cat=<?= $item['category_id'] ?>&name_cat=<?= $item['name'] ?>"><?= $item['name'] ?></a></div>   	
            <?}?>			
        </div><!-- /showback -->
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Добавить категорию</h4>
                    <form action="admin.php" class="form-horizontal style-form" method="GET">
                        <input type="hidden" name="view" value="UpdateCatMethod"/>
                        <input type="hidden" hidden="true" name="id_category" value="<?= $id ?>"/>
                        <div class="form-group">
                            <label class="col-sm-3 col-sm-3 control-label">Новое название</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control"   name="category" value="<?= $name ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <input type="submit" value="Изменить" class="form-control">
                        </div>
                    </div>
                </form> 
            </div>
        </div><!-- col-lg-12-->      	
    </div><!-- /row -->
