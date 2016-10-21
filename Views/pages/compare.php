<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="index.php">Главная</a></li>
        <li class="active">Список для сравнения</li>
    </ol>
</div>
<?php
if ($_SESSION['compare'] != '0') {
    foreach ($_SESSION['compare'] as $id => $quantity) {
        $item = ViewGetTools::OneProdCart($id);
        ?>
        <div class="col-sm-6" >
            <div class="product-image-wrapper"  >
                <div class="single-products">
                    <table class="table table-condensed">
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="index.php?view=DeleteCompare&id=<?= $item['id']; ?>"><i class="fa fa-times"></i></a>
                        </td>
                    </table>
                    <div class="productinfo text-center">
                        <a href="index.php?view=product&id=<? echo $item['id']; ?>">
                            <div class="col-sm-6">
                                <img src="public/images/<?echo $item['image']; ?>"/></br>
                            </div>
                            <h2><? echo number_format($item['price'],2); ?> грн</h2>
                            <p><? echo $item['title']; ?></p></a>
                        <p><? echo $item['discription']; ?></p></a>
                        <a href="index.php?view=AddToCart&id=<?echo $item['id'];?>" class="btn btn-default add-to-cart">
                            <i class="fa fa-shopping-cart"></i>Добавить в корзину</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
} else
    echo "<h2>Добавьте товары для сравнения!</h2>";
?>