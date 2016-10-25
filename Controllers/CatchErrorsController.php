<?php

/*
 * файл перевіряє чи існує такая сторінка на сайті
 * якшо не існує, то завантажиться сторінка з відповідним
 * текстом  
 */
$arr = array('index', 'cart', 'product', 'orders', 'category', 'AddToCart', 'UpdateCart',
    '404', 'book', 'converter', 'compare', 'AddToCompare', 'DeleteCompare', 'DeleteCart',
    'ConvertIt', 'AddCatMethod', 'addCategory', 'UpdateCatMethod', 'updateCategory', 'DeleteCatMethod',
    'deleteCategory', 'AddGoodMethod', 'addGood', 'UpdateGoodMethod', 'updateGood', 'DeleteGoodMethod',
    'deleteGood', 'brand', 'blog', 'detail', 'auth', 'AuthMethod', 'RegisterMethod', 'ExitMethod', 'info',
    'motivation', 'search', 'SearchMethod', 'allOrders', 'addArt', 'deleteArt', 'updateArt');
if (!in_array($view, $arr))
    header('location:index.php?view=404');
?>