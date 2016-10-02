<?php

/*
 * сlass provides methods for goods comparison
 */
class CompareModel {

    public function __construct() {
        
    }
    
    //addition to comparision list
    public static function AddToCompare($id) {
        try {
            if (isset($_SESSION['compare'][$id])) {
                $_SESSION['compare'][$id] ++;
                return true;
            } else {
                $_SESSION['compare'][$id] = 1;
                return true;
            }
            return false;
        } catch (Exception $ex) {
            print($ex);
        }
    }
    
    // calculate number goods add to list comparision
    public static function CompareItems($compare) {
        try {
            $NumItems = 0;
            if (is_array($compare)) {
                foreach ($compare as $id => $temp) {
                    $NumItems = $NumItems + $temp;
                }
            }
            return $NumItems;
        } catch (Exception $ex) {
            print($ex);
        }
    }
    
    // delete from comparision - list
    public static function DeleteProdFromCompare($id) {
        unset($_SESSION['compare'][$id]);
    }
}
?>