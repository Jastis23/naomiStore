<?php

/**
 * class provide card functionality
 */
class CartModel extends ViewGetTools {

    public function __construct() {
        
    }
    
    //add goods to card
    public static function AddToCart($id) {
        try {
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id] ++;
                return true;
            } else {
                $_SESSION['cart'][$id] = 1;
                return true;
            }
            return false;
        } catch (Exception $ex) {
            print($ex);
        }
    }
    
    //update goods in card
    public static function UpdateCart() {
        try {
            foreach ($_SESSION['cart'] as $id => $temp) {
                if ($_POST['id'] == '0') {
                    unset($_SESSION['cart'][$id]);
                } else {
                    $_SESSION['cart'][$id] = $_POST[$id];
                }
            }
        } catch (Exception $ex) {
            print($ex);
        }
    }
    
    //delete goods from card
    public static function DeleteProdFromCart($id) {
        unset($_SESSION['cart'][$id]);
    }

    //calculate numbers goods in card
    public static function TotalItems($cart) {
        try {
            $NumItems = 0;
            if (is_array($cart)) {
                foreach ($cart as $id => $temp) {
                    $NumItems = $NumItems + $temp;
                }
            }
            return $NumItems;
        } catch (Exception $ex) {
            print($ex);
        }
    }
    
    //calculate all price goods in card
    public static function TotalPrice($cart) {
        try {
            $dbcon = ViewGetTools::connect();
            $TotalPrice = 0.0;
            if (is_array($cart)) {
                foreach ($cart as $id => $temp) {

                    $res = $dbcon->query("SELECT price FROM products WHERE id='$id'");
                    if ($res) {
                        $ItemPrice = $res->fetchColumn(0);
                        $TotalPrice = $TotalPrice + $ItemPrice * $temp;
                    }
                }
            }
            return $TotalPrice;
        } catch (Exception $ex) {
            print($ex);
        }
    }

}

?>