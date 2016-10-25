<?php

/*
 * Отримує дані з views і обробляє їх за допомогою models
 * для забезпечення роботи з товарами
 */
$view = empty($_GET['view']) ? 'index' : $_GET['view'];
switch ($view) {
    //додавання товарів до бази даних
    case('AddGoodMethod'):
        $name = $_GET['name_cat'];
        $id = $_GET['id_category'];
        $title = $_GET['title'];
        $discription = $_GET['discription'];
        $price = $_GET['price'];
        $image = $_GET['image'];
        $res = GoodsModel::AddGood($name, $id, $title, $discription, $price, $image);
        header('location:admin.php?view=addGood');
        break;
    //видалення товарів з бази
    case('DeleteGoodMethod'):
        $id = $_GET['id'];
        $res = GoodsModel::DeleteGood($id);
        header('location:admin.php?view=deleteGood');
        break;
    //оновлення товарів в базі
    case('UpdateGoodMethod'):
        $category = $_GET['category'];
        $id = $_GET['id'];
        $title = $_GET['title'];
        $discription = $_GET['discription'];
        $price = $_GET['price'];
        $image = $_GET['image'];
        $res = GoodsModel::UpdateGood($name, $id, $title, $discription, $price, $image);
        header('location:admin.php?view=updateGood');
        break;
}
?>