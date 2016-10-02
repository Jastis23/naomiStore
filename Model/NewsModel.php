<?php

/*
 * класс для работы с новостями
 */
class NewsModel {
    
    //виводить усі новини
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
    
    //демонструю новину у розгорнутому форматі
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