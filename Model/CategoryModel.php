<?php

/*
  class, then providing work with categories of goods
 */

Class CategoryModel extends ViewGetTools {

    //add category
    public static function AddCategory($name, $id) {
        try {
            $dbcon = parent::connect();
            $res = $dbcon->prepare("INSERT INTO categories(name,category_id) VALUES('$name','$id')");
            $res->execute();
        } catch (Exception $ex) {
            print($ex);
        }
    }

    //delete category
    public static function DeleteCategory($category) {
        try {
            $dbcon = parent::connect();
            $res = $dbcon->exec("DELETE FROM categories WHERE category_id='$category'");
        } catch (Exception $ex) {
            print($ex);
        }
    }

    //update category
    public static function UpdateCategory($name, $id) {
        try {
            $dbcon = parent::connect();
            $res = $dbcon->exec("UPDATE categories SET name='$name' WHERE category_id='$id'");
        } catch (Exception $ex) {
            print($ex);
        }
    }

}
?>