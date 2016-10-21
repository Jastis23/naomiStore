
<?php
$name=$_GET['name_cat'];
$id=$_GET['id_cat'];
?>
<h3><i class="fa fa-angle-right"></i> Добавление</h3>
<div class="col-lg-6 col-md-6 col-sm-12">
    <! -- ALERTS EXAMPLES -->
    <div class="showback">
        <h4><i class="fa fa-angle-right"></i> Выберете категорию для добавления товара</h4> 
        <?php
        $dbcon = ViewGetTools::connect();
        $order = new ViewGetTools();
        foreach ($order->GetLinks() as $item) {
            ?> 	
            <div class="alert alert-warning"><a href="admin.php?view=addGood&id_cat=<?= $item['category_id'] ?>&name_cat=<?= $item['name'] ?>"><?= $item['name'] ?></a></div>   	
            <?}?>	
        </div><!-- /showback -->	
    </form>
    <!-- BASIC FORM ELELEMNTS -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Добавить товар</h4>
                <form action="admin.php" class="form-horizontal style-form" method="GET">
                    <input type="hidden" name="view" value="AddGoodMethod"/>
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Наименование</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control"   name="title" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Описание</label>
                        <div class="col-sm-5">
                            <textarea type="text" class="form-control" name="discription" ></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Цена</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control"   name="price" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-3 control-label">Картинка</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control"   name="image" >
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-3">
                            <input type="submit" value="Добавить" class="form-control">
                        </div>
                    </div>
                    <input type="hidden" name="category" value="<?= $name ?>"/>
                    <input type="hidden" name="id_category" value="<?= $id ?>"/>
            </form>
        </div>
    </div><!-- col-lg-12-->      	
</div><!-- /row -->


