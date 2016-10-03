<?php

/*
 * class then provides interaction with news page
 */
class NewsModel {
    
    // show all news
    public static function GetNews() {
        try {
            $dbcon = ViewGetTools::connect();
            $res = $dbcon->query("SELECT * FROM news");
            $res = $res->fetchall(PDO::FETCH_ASSOC);
            return $res;
        } catch (Exception $ex) {
            print($ex);
        }
    }
    
    //shows news  in expanded form
    public static function OneNew($id) {
        try {
            $dbcon = ViewGetTools::connect();
            $res = $dbcon->query("SELECT * FROM news WHERE id='$id'");
            $res = $res->fetchall(PDO::FETCH_ASSOC);
            return $res;
        } catch (Exception $e) {
            print($e);
        }
    }

}

?>