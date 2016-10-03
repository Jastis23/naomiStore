<?php

/*
 * class then provides search on sites
 */

class SearchModel {
    
    //execute search
    public static function Search($text) {
        $dbcon = ViewGetTools::connect();
        $res = $dbcon->query("SELECT * FROM products WHERE title LIKE '%$text%' OR category LIKE '%$text%' OR discription LIKE '%$text%' OR brand LIKE '%$text%'");
        $res = $res->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

}

?>