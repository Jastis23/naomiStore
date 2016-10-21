<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="index.php">Главная</a></li>
                <li class="active">Оформление заказа</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <?php
            if ($_SESSION['cart'] != '0' && !isset($_POST['order'])) {
                ?>
                <form action="index.php?view=orders" method="POST" name="cart_form">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Наименование</td>
                                <td class="description"></td>
                                <td class="price">Цена</td>
                                <td class="quantity">Количество</td>
                                <td class="total">Общая сумма</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
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
                                        <p>Web ID: 1089772</p>.
                                    </td>
                                    <td class="cart_price">
                                        <p><?echo number_format($item['price'],2);?> грн</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">
                                            <p class="cart_quantity_input" type="text" name="<?= $id ?>"><?= $quantity; ?></p>
                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price"><?echo number_format($item['price']*$quantity,2);?>грн</p>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <h3 align="center">Общая сумма заказа - <?echo number_format($_SESSION['TotalPrice'],2);?></h3>
                        <table align="center">
                            <tr>
                                <td>
                                    Имя : 
                                </td>					
                                <td>
                                    <input name="name" type="text"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Фамилия : 
                                </td>
                                <td>
                                    <input name="second_name" type="text"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Адресс : 
                                </td>
                                <td>
                                    <input name="adress" type="text"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    email : 
                                </td>
                                <td>
                                    <input name="email" type="text"/>
                                </td>
                            </tr>
                        </table>
                        <p align="center">
                            <input class="update"  type="submit" name="order" value="Заказать"/>
                        </p>
                    </form>		
                    <?php
                } else
                if ($_SESSION['cart'] != '0' && isset($_POST['order'])) {
                    $date = date('Y-m-d');
                    $time = date('M:i:s');
                    $dbcon = ViewGetTools::connect();
                    foreach ($_SESSION['cart'] as $id => $temp) {
                        $item = ViewGetTools::OneProdCart($id);
                        $res = $dbcon->prepare("INSERT INTO orders(name,second_name,adress,email,date,time,product,prod_id,price,qty)
            VALUES ('" . $_POST['name'] . "','" . $_POST['second_name'] . "','" . $_POST['adress'] . "','" . $_POST['email'] . "','$date','$time','{$item['title']}','{$item['id']}','{$item['price']}',$temp)");
                        $res->execute();
                    }
                    echo "<p>Ваш заказ оформлен</p>";
                }
                ?>
        </div>
    </div>
</section> <!--/#cart_items-->