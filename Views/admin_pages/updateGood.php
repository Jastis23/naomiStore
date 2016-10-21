<div id="wrap">
    <?php
    $category = $_GET['id_cat'];
    $id = $_GET['id'];
    $title = $_GET['title'];
    $discription = $_GET['discription'];
    $price = $_GET['price'];
    $image = $_GET['image'];
    ?>
    <h3><i class="fa fa-angle-right"></i> Редактирование</h3>
    <div class="col-lg-7 col-md-7 col-sm-12">
        <! -- ALERTS EXAMPLES -->
        <div class="showback">
            <h4><i class="fa fa-angle-right"></i> Выберете категорию для редактирования</h4> 
            <?php
            $dbcon = ViewGetTools::connect();
            $order = new ViewGetTools();
            foreach ($order->GetLinks() as $item) {
                ?> 
                <div class="alert alert-warning"><a href="admin.php?view=updateGood&id_cat=<?= $item['category_id'] ?>&name_cat=<?= $item['name'] ?>"><?= $item['name'] ?></a></div>
                <?}?>
            </div>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-12">
            <! -- ALERTS EXAMPLES -->
            <div class="showback">
                <h4><i class="fa fa-angle-right"></i> Выберете товар для редактирования</h4> 
                <?php
                echo "<h2>" . $_GET['name_cat'] . "</h2>";
                $dbcon = ViewGetTools::connect();
                $order = new ViewGetTools();
                foreach ($order->Category($category) as $item) {
                    ?> 

                    <div class="alert alert-warning"><a href="admin.php?view=updateGood&id=<?= $item['id'] ?>&id_cat=<?= $item['category'] ?>&title=<?= $item['title'] ?>&discription=<?//=$item['discription']?>
                                                        &price=<?= $item['price'] ?>&image=<?= $item['image'] ?>"><?= $item['title'] ?></a></div>

                    <?}?>
                </div>
            </div>
            <?php if ($_GET['id']) {
                ?>
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Внести изменения по товару</h4>
                            <form action="admin.php" class="form-horizontal style-form" method="GET">
                                <input type="hidden" name="view" value="UpdateGoodMethod" />
                                <input type="hidden" hidden="true" name="id_category" value="<?= $id ?>"/>
                                <div class="form-group">
                                    <label class="col-sm-3 col-sm-3 control-label">Название</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" value="<?= $title ?>"  name="title" value="<?= $name ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-sm-3 control-label">Описание</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control"   name="discription" value="<?= $name ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-sm-3 control-label">Цена</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control"  value="<?= price ?>" name="price" value="<?= $name ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-sm-3 control-label">Картинка</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" value="<?= $image ?>"  name="image" value="<?= $name ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-sm-3 control-label">Категория</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control"  value="<?= $category ?>" name="category" value="<?= $name ?>">
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-sm-3">
                                        <input type="submit" value="Изменить" class="form-control">
                                    </div>
                                </div>
                                <input type="hidden" hidden="true" name="id" value="<?= $id ?>"/>	
                </form> 
            </div>
        </div><!-- col-lg-12-->      	
    </div><!-- /row -->
    <?}?>

