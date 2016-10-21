<div id="wrap">
    <?php
    $category = $_GET['id_cat'];
    $id = $_GET['id'];
    $title = $_GET['title'];
    $discription = $_GET['discription'];
    $price = $_GET['price'];
    $image = $_GET['image'];
    ?>



    <h3><i class="fa fa-angle-right"></i> Удаление</h3>
    <div class="col-lg-7 col-md-6 col-sm-12">
        <! -- ALERTS EXAMPLES -->
        <div class="showback">
            <h4><i class="fa fa-angle-right"></i> Выберете категорию для удаления</h4>  
            <?php
            $dbcon = ViewGetTools::connect();
            $order = new ViewGetTools();
            foreach ($order->GetLinks() as $item) {
                ?> 
                <div class="alert alert-warning"><a href="admin.php?view=deleteGood&id_cat=<?= $item['category_id'] ?>&name_cat=<?= $item['name'] ?>"><?= $item['name'] ?></a></div>

                <?}?>
            </div>
        </div>	

        <div class="col-lg-7 col-md-7 col-sm-12">
            <! -- ALERTS EXAMPLES -->
            <div class="showback">
                <h4><i class="fa fa-angle-right"></i> Для удаления нажмите на товар</h4> 
                <?php
                echo "<h2>" . $_GET['name_cat'] . "</h2>";
                $dbcon = ViewGetTools::connect();
                $order = new ViewGetTools();
                foreach ($order->Category($category) as $item) {
                    ?> 
                    <div class="alert alert-warning"><a href="admin.php?view=DeleteGoodMethod&id=<?= $item['id'] ?>&id_cat=<?= $item['category'] ?>&title=<?= $item['title'] ?>&discription=<?= $item['discription'] ?>
                                                        &price=<?= $item['price'] ?>&image=<?= $item['image'] ?>"><?= $item['title'] ?></a>
            </div>
            <?}?>
        </div>
    </div>
</div>