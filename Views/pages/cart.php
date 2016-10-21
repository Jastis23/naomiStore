
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="index.php">Главная</a></li>
                <li class="active">Корзина</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <?php
            if ($_SESSION['cart'] != '0') {
                ?>
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Товар</td>
                            <td class="description"></td>
                            <td class="price">Цена</td>
                            <td class="quantity">Количество</td>
                            <td class="total">Общая сумма</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                    <form action="index.php?view=UpdateCart" method="POST" name="cart_form">
                        <?php
                        foreach ($_SESSION['cart'] as $id => $quantity) {
                            $item = ViewGetTools::OneProdCart($id);
                            ?>
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="public/images/<?= $item['image']; ?>" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href=""><?= $item['title']; ?></a></h4>
                                    <p>Web ID: 1089772</p>
                                </td>
                                <td class="cart_price">
                                    <p><?echo number_format($item['price'],2);?> грн</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">

                                        <input class="cart_quantity_input" type="text" name="<?echo $id;?>" value="<?= $quantity; ?>" autocomplete="off" size="2">

                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price"><?echo number_format($item['price']*$quantity,2);?>грн</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="index.php?view=DeleteCart&id=<?= $item['id'] ?>"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            <?}?>
                            </tbody>
                    </table>
                    <h2 align="center">Общая сумма заказа - <?echo number_format($_SESSION['TotalPrice'],2);?></h2>
                    <p align="center"><input class="update" type="submit" name="update" value="Обновить"/></p>
                    </form>	
                    <p align="center"><a href="index.php?view=orders">Оформить заказ</a></p>
        <?php
    } else echo "<h2>Ваша корзина пуста !</h2>";
    ?>
        </div>
    </div>
</section> <!--/#cart_items-->
