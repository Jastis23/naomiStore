<?php

/*
 * class provides interaction with admin page
 */

Class GoodsModel extends ViewGetTools {

    //add goods
    public static function AddGood($name, $id, $title, $discription, $price, $image) {
        try {
            $dbcon = parent::connect();
            $res = $dbcon->prepare("INSERT INTO products(title,discription,price,image,category) VALUES('$title','$discription','$price','$image','$id')");
            $res->execute();
        } catch (Exception $ex) {
            print($ex);
        }
    }

    //delete goods
    public static function DeleteGood($id) {
        try {
            $dbcon = parent::connect();
            $res = $dbcon->exec("DELETE FROM products WHERE id='$id'");
        } catch (Exception $ex) {
            print($ex);
        }
    }

    //update goods
    public static function UpdateGood($name, $id, $title, $discription, $price, $image) {
        try {
            $dbcon = parent::connect();
            $res = $dbcon->exec("UPDATE products SET title='$title',discription='$discription',price='$price',image='$image' WHERE id='$id'");
        } catch (Exception $ex) {
            print($ex);
        }
    }

}

?>