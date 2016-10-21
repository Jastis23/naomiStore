<?php
$brand_id = $_GET['id'];
$blog = new ViewGetTools();
foreach ($blog->Brand($brand_id) as $item) {
    ?>
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <a href="index.php?view=product&id=<? echo $item['id']; ?>">
                        <img src="public/images/<?echo $item['image']; ?>" height="250px"/></br>
                        <h2><? echo number_format($item['price'],2); ?> грн</h2>
                        <p><? echo substr($item['title'],0,30); ?></p></a>
                    <a href="index.php?view=AddToCart&id=<?echo $item['id'];?>" class="btn btn-default add-to-cart">
                        <i class="fa fa-shopping-cart"></i>Добавить в корзину</a>
                </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="index.php?view=AddToCompare&id=<?echo $item['id'];?>"><i class="fa fa-plus-square"></i>Добавить в список сравнения</a></li>
                </ul>
            </div>
        </div>
    </div>
    <?php } ?>	