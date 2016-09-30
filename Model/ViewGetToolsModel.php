<?php

/**
  base class for view information about goods, menu on site. Also, create conection to database
 */
class ViewGetTools {

    public function __construct() {
        
    }

    // connecting to db
    public static function connect() {
        try {
            $dbcon = new PDO('mysql:host=localhost;dbname=shop', 'root', '1');
        } catch (PDOException $e) {
            echo "Couldn`t connect to database";
        }
        return $dbcon;
    }

    // view all goods
    public function ShowProducts() {
        try {
            $dbcon = self::connect();
            $res = $dbcon->query('SELECT * FROM products');
            return $res;
        } catch (Exception $ex) {
            print($ex);
        }
    }

    // group  goods on brand
    public function ShowBrands() {
        try {
            $dbcon = self::connect();
            $res = $dbcon->query('SELECT brand, COUNT(brand) AS total from products GROUP BY brand');
            return $res;
        } catch (Exception $ex) {
            print($ex);
        }
    }

    // view all categories
    public function GetLinks() {
        try {
            $dbcon = self::connect();
            $link = $dbcon->query('SELECT * FROM categories');
            return $link;
        } catch (Exception $ex) {
            print($ex);
        }
    }

    // view good by id
    public static function OneProduct($id) {
        try {
            $dbcon = self::connect();
            $res = $dbcon->query("SELECT * FROM products WHERE id='$id'");
            return $res;
        } catch (Exception $ex) {
            print($ex);
        }
    }

    // view good from buscket
    public static function OneProdCart($id) {
        try {
            $dbcon = self::connect();
            $res = $dbcon->query("SELECT * FROM products WHERE id='$id'");
            $res->execute();
            $result = $res->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $ex) {
            print($ex);
        }
    }

    // view all goods by categories
    public function Category($category) {
        try {
            $dbcon = self::connect();
            $res = $dbcon->query("SELECT * FROM products WHERE category='$category'");
            return $res;
        } catch (Exception $ex) {
            print($ex);
        }
    }

    // sort goods by brand
    public function Brand($brand) {
        try {
            $dbcon = self::connect();
            ;
            $res = $dbcon->query("SELECT * FROM products WHERE brand='$brand'");
            return $res;
        } catch (Exception $ex) {
            print($ex);
        }
    }

    // view all orders
    public static function AllOrders() {
        try {
            $dbcon = self::connect();
            $res = $dbcon->query('SELECT * FROM orders');
            return $res;
        } catch (Exception $ex) {
            print($ex);
        }
    }

    // view informations about gyms
    public static function GetInfo() {
        try {
            $dbcon = self::connect();
            $res = $dbcon->query('SELECT * FROM info');
            return $res;
        } catch (Exception $e) {
            print($e);
        }
    }

}
?>