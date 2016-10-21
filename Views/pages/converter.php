<?php
session_start();
?>
<div class="contact-form">
    <h2 class="title text-center">Подобрать программу тренировок</h2>
    <div class="status alert alert-success" style="display: none"></div>
    <form id="main-contact-form" class="contact-form row" action="index.php">
        <input type="hidden" name="view" value="ConvertIt"/>
        <div class="form-group col-md-9">
            <input type="text" name="weight" class="form-control" required="required" placeholder="Вес">
        </div>
        <div class="form-group col-md-9">
            <input type="text" name="height" class="form-control" required="required" placeholder="Рост">
        </div>
        <div class="form-group col-md-9">
            <input type="text" name="circle" class="form-control" required="required" placeholder="Объем груди">
        </div>
        <div class="form-group col-md-9" >
            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Подобрать">
        </div>
    </form>
</div>
<?php
if ($_SESSION['login']) {
    if ($_SESSION['program']) {
        echo $_SESSION['program'];
    } else
        echo"<p>Заполните форму, что бы подобрать программу тренировок !</p>"
        ?>
    <h2 class="title text-center">Вам подойдут следующие товары</h2>
    <?php
    if (!$_SESSION['products']) {
        echo "<p>Заполните форму, что бы узнать подходящие вам товары !</p>";
    } else {

        foreach ($_SESSION['products'] as $key => $item) {
            ?>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <a href="index.php?view=product&id=<? echo $item['id']; ?>">
                                <img src="public/images/<?echo $item['image']; ?>" height="200px"/></br>
                                <h2><? echo number_format($item['price'],2); ?></h2>
                                <p><? echo substr($item['title'],0,23); ?></p></a>
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
            <?php
        }
    }
    unset($_SESSION['program']);
    unset($_SESSION['products']);
} else
    echo "<h4>Вам необходимо зарегестрироваться, что бы функция стала доступной !</h4><a href='index.php?view=auth'>Регистрация</a>"
    ?>
